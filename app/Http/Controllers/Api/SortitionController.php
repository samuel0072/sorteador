<?php

namespace App\Http\Controllers\Api;

use App\Facades\Sortition as SortitionFacade;
use App\Http\Controllers\Controller;
use App\Models\Sortition;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SortitionController extends Controller
{
    public function createSortition(Request $request): Sortition
    {
        $request->validate([
            "nickname" => "required|string|max:250",
            "description" => "nullable|string|max:1000",
            "entries" => "nullable|array"
        ]);
       $sortition = new Sortition;
       $sortition->nickname = $request->input("nickname");
       $sortition->description = $request->input("description");
       $entries = new Collection();

       return SortitionFacade::createSortition($sortition, $entries);
    }
}
