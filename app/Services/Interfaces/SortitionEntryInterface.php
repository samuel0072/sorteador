<?php

namespace App\Services\Interfaces;

use App\Models\Sortition;
use Illuminate\Support\Collection;

interface SortitionEntryInterface
{

    /**
     * Obtem as entradas para serem usadas em um sorteio
     *
     * @param Sortition $sortition O sorteio
     * @param Collection $suppliedEntries
     * @return Collection As entradas obtidas
     */
    public function getEntries(Sortition $sortition, Collection $suppliedEntries): Collection;

    public function createEntriesCollection(array $entriesData): Collection;
}
