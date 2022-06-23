<?php

namespace App\Services;

use App\Models\Sortition;
use App\Models\SortitionEntry;
use Illuminate\Support\Collection;

class SingleEntryDrawSortition implements Interfaces\DrawSortitionInterface
{

    /**
     * @inheritDoc
     */
    public function drawSortition(Sortition $sortition, Collection $entries, array $options): Collection
    {
        // TODO: Implement drawSortition() method.
    }
}
