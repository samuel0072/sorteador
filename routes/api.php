<?php

use App\Http\Controllers\Api\SortitionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix("sortition")->group(function() {
    Route::post("create", [SortitionController::class, "createSortition"]);
    Route::put("edit", [SortitionController::class, "editSortition"]);
    Route::post("addEntries", [SortitionController::class, "addEntriesToSortition"]);
    Route::get("/{id}", [SortitionController::class, "getSortitionById"])
        ->where("id", "[0-9]+");
    Route::delete("/{id}", [SortitionController::class, "removeSortition"])
        ->where("id", "[0-9]+");
    Route::post("execute/{id}", [SortitionController::class, "executeSortition"])
        ->where("id", "[0-9]+");
    Route::get("all", [SortitionController::class, "getAllSortitions"]);
});
