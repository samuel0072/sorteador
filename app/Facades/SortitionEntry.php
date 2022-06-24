<?php

namespace App\Facades;

use App\Services\Interfaces\SortitionEntryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
/**
 * @method static Collection getEntries(\App\Models\Sortition $sortition, Collection $suppliedEntries)
 * @method static Collection createEntriesCollection(array $entriesData)
 */
class SortitionEntry extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return SortitionEntryInterface::class;
    }
}
