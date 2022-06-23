<?php

namespace App\Services;

use App\Models\Sortition;
use Illuminate\Support\Collection;

class GetPreSavedTextEntries implements Interfaces\GetEntriesInterface
{

    /**
     * @inheritDoc
     */
    public function getEntries(Sortition $sortition, Collection $entries): Collection
    {
        // TODO: Implement getEntries() method.
    }
}
