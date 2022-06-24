<?php

namespace App\Facades;

use App\Services\Interfaces\SortitionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Models\Sortition createSortition(\App\Models\Sortition $sortition, Collection $entries)
 * @method static \App\Models\Sortition editSortition(\App\Models\Sortition $sortition, array $data)
 * @method static Collection addEntriesToSortition(\App\Models\Sortition $sortition, Collection $entries)
 * @method static null|\App\Models\Sortition getSortitionById($id)
 * @method static bool deleteSortition(\App\Models\Sortition $sortition)
*/
class Sortition extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return SortitionInterface::class;
    }
}
