<?php

namespace App\Services;

use App\Models\Sortition;
use App\Models\SortitionEntry;
use Illuminate\Support\Collection;

class SimpleTextEntry implements Interfaces\SortitionEntryInterface
{

    /**
     * @inheritDoc
     */
    public function getEntries(Sortition $sortition, Collection $suppliedEntries): Collection
    {
        $sortitionEntries = $sortition->entries;
        $sortitionEntries->concat($suppliedEntries);
        return $sortitionEntries;
    }

    public function createEntriesCollection(array $entriesData): Collection
    {
        $entries = new Collection();

        foreach ($entriesData as $entry) {
            $sortitionEntry = new SortitionEntry;
            $sortitionEntry->value = $entry["value"];
            $entries->add($sortitionEntry);
        }

        return $entries;
    }
}
