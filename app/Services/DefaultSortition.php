<?php

namespace App\Services;

use App\Facades\DrawSortition;
use App\Models\Sortition;
use App\Models\SortitionEntry;
use Exception;
use Illuminate\Support\Collection;
use App\Facades\GetEntries;
use Illuminate\Support\Facades\DB;

class DefaultSortition implements Interfaces\SortitionInterface
{

    /**
     * @inheritDoc
     */
    public function createSortition(Sortition $sortition, Collection $entries): Sortition
    {
        try {
            DB::beginTransaction();
            $sortition->save();
            foreach ($entries as $entry) {
                $entry->sortition_id = $sortition->id;
                $entry->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $sortition;
    }

    /**
     * @inheritDoc
     */
    public function editSortition(Sortition $sortition, array $data): Sortition
    {
        $sortition->nickname = $data["nickname"];
        $sortition->description = $data["description"];
        $sortition->save();
        return $sortition;
    }

    /**
     * @inheritDoc
     */
    public function addEntryToSortition(Sortition $sortition, SortitionEntry $entry): SortitionEntry
    {
        $entry->sortition_id = $sortition->id;
        $entry->save();
        return $entry;
    }

    public function deleteSortition(Sortition $sortition): bool
    {
       $entries = $sortition->entries;
       foreach ($entries as $entry)
       {
           $entry->delete();
       }
       return $sortition->delete();
    }

    public function getSortitionById($id): null|Sortition
    {
        return Sortition::find($id);
    }
}
