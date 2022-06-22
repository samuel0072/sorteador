<?php

namespace App\Services\Interfaces;

use App\Models\Sortition;
use Illuminate\Support\Collection;

interface GetEntriesInterface
{

    /**
     * Obtem as entradas para serem usadas em um sorteio
     *
     * @param Sortition $sortition O sorteio
     * @param Collection $entries Entradas que podem ser consideradas
     * @return Collection As entradas obtidas
     */
    public function getEntries(Sortition $sortition, Collection $entries): Collection;
}
