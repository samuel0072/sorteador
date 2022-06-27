<?php

namespace App\Http\Controllers\Api;

use App\Facades\DrawSortition;
use App\Facades\SortitionEntry as EntryFacade;
use App\Facades\Sortition as SortitionFacade;
use App\Http\Controllers\Controller;
use App\Models\Sortition;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

class SortitionController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    #[ArrayShape(shape: ["sortition" => "\App\Models\Sortition", "entries" => "\Illuminate\Support\Collection"])]
    public function createSortition(Request $request): array
    {
        $request->validate([
            "nickname" => "required|string|max:200",
            "description" => "nullable|string|max:1000",
            "entries" => "nullable|array",
            "entries.*.value" => "required|string"
        ]);
       $sortition = new Sortition;
       $sortition->nickname = $request->input("nickname");
       $sortition->description = $request->input("description");

       $entries = EntryFacade::createEntriesCollection($request->input('entries'));

       return [
            "sortition" => SortitionFacade::createSortition($sortition, $entries),
            "entries" => $entries
        ];
    }

    public function editSortition(Request $request): Sortition
    {
        $request->validate([
            "id" => "required|int|min:0",
            "nickname" => "required|string|max:200",
            "description" => "required|string|max:1000"
        ]);
        $id = $request->input("id");
        $sortition = SortitionFacade::getSortitionById($id);
        $data = [
            "nickname" => $request->input("nickname"),
            "description" => $request->input("description")
        ];
        return SortitionFacade::editSortition($sortition, $data);
    }

    public function addEntriesToSortition(Request $request): Collection
    {
        $request->validate([
            "sortitionId" => "required|int|min:0",
            "entries" => "required|array",
            "entries.*.value" => "required|string|max:200"
        ]);

        $id = $request->input("sortitionId");
        $sortition = SortitionFacade::getSortitionById($id);

        $entries = EntryFacade::createEntriesCollection($request->input('entries'));

        return SortitionFacade::addEntriesToSortition($sortition, $entries);
    }

    public function getSortitionById(Request $request, int $id): null|Sortition
    {
        $sortition = SortitionFacade::getSortitionById($id);
        $sortition->load("entries");
        return $sortition;
    }

    public function removeSortition(Request $request, int $id): bool
    {
        $sortition = SortitionFacade::getSortitionById($id);
        return SortitionFacade::deleteSortition($sortition);
    }

    public function executeSortition(Request $request, int $id): Collection
    {
        $request->validate([
            "entries" => "nullable|array",
            "entries.*.value" => "nullable|string|max:200",
            "options" => "nullable|array"
        ]);
        $sortition = SortitionFacade::getSortitionById($id);

        $suppliedEntries = EntryFacade::createEntriesCollection($request->input('entries'));

        $entries = EntryFacade::getEntries($sortition, $suppliedEntries);

        $options = $request->input("options");
        return DrawSortition::drawSortition($sortition, $entries, $options);
    }

    public function getAllSortitions(): Collection
    {
        return SortitionFacade::getAllSortitions();
    }
}
