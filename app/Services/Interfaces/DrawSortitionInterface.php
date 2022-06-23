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
     * @param array $options Opções referentes ao modo do sorteio ser executado
     * @return Collection A(s) entrada(s) sorteada(s)
     */
    public function drawSortition(Sortition $sortition, Collection $entries, array $options): Collection;
}
