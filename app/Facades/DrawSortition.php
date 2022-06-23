<?php

namespace App\Facades;

use App\Services\Interfaces\DrawSortitionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection drawSortition(\App\Models\Sortition $sortition, Collection $entries, array $options)
 */
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
