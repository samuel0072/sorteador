<?php

namespace App\Facades;

use App\Models\SortitionEntry;
use App\Services\Interfaces\SortitionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Models\Sortition createSortition(\App\Models\Sortition $sortition, Collection $entries)
 * @method static \App\Models\Sortition editSortition(\App\Models\Sortition $sortition, array $data)
 * @method static \App\Models\SortitionEntry addEntryToSortition(\App\Models\Sortition $sortition, \App\Models\SortitionEntry $entry)
 * @method static bool removeSortitionEntry(SortitionEntry $entry)
 * @method static Collection executeSortition(\App\Models\Sortition $sortition, Collection $suppliedEntries, array $options)
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
