<?php

namespace App\Facades;

use App\Services\Interfaces\GetEntriesInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
/**
 * @method static Collection getEntries(\App\Models\Sortition $sortition, Collection $entries)
 */
class GetEntries extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return GetEntriesInterface::class;
    }
}
