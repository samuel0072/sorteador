<?php

namespace App\Services\Interfaces;

use App\Models\Sortition;
use App\Models\SortitionEntry;
use Illuminate\Support\Collection;

interface DrawSortitionInterface
{
    /**
     * Sorteia uma entrada de um sorteio
     *
     * @param Sortition $sortition O sorteio
     * @param Collection $entries As entradas a serem consideradas
     * @return SortitionEntry A entrada sorteada
     */
    public function drawSortition(Sortition $sortition, Collection $entries): SortitionEntry;
}
