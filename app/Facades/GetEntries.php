<?php

namespace App\Facades;

use App\Services\Interfaces\GetEntriesInterface;
use Illuminate\Support\Facades\Facade;

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
