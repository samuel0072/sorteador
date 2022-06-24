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
    public function drawSortition(Sortition $sortition, Collection $entries, array $options = null): Collection
    {
        $count = $entries->count();
        $randIndex = rand(0, $count-1);
        $result = $entries->get($randIndex);
        return new Collection([$result]);
    }
}
