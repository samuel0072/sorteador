<?php

namespace App\Http\Controllers\Api;

use App\Facades\Sortition as SortitionFacade;
use App\Http\Controllers\Controller;
use App\Models\Sortition;
use App\Models\SortitionEntry;
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

       $entries = new Collection();
       $rawEntries = $request->input('entries');

       foreach ($rawEntries as $entry) {
           $sortitionEntry = new SortitionEntry;
           $sortitionEntry->value = $entry["value"];
           $entries->add($sortitionEntry);
       }

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
        $sortition = Sortition::find($id);
        $data = [
            "nickname" => $request->input("nickname"),
            "description" => $request->input("description")
        ];
        return SortitionFacade::editSortition($sortition, $data);
    }
}