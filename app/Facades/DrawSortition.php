<?php

namespace App\Facades;

use App\Services\Interfaces\DrawSortitionInterface;
use Illuminate\Support\Facades\Facade;

class DrawSortition extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return DrawSortitionInterface::class;
    }
}
