<?php

namespace App\Facades;

use App\Services\Interfaces\SortitionInterface;
use Illuminate\Support\Facades\Facade;

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
