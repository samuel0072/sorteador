<?php

namespace App\Services\Interfaces;

use App\Models\Sortition;
use App\Models\SortitionEntry;
use Illuminate\Support\Collection;

interface SortitionInterface
{
    /**
     * Persiste um sorteio e suas entradas
     *
     * @param Sortition $sortition O sorteio a ser persistido
     * @param Collection $entries As entradas para serem persistidas junto do sorteio
     * @return Sortition o sorteio persistido
     */
    public function createSortition(Sortition $sortition, Collection $entries): Sortition;

    /**
     * Edita as informações básicas de um sorteio
     *
     * @param Sortition $sortition O sorteio a ser editado
     * @param array $data Os dados para editar
     * @return Sortition O sorteio editado
     */
    public function editSortition(Sortition $sortition, array $data): Sortition;

    /**
     * Adiciona uma entrada para um sorteio
     *
     * @param Sortition $sortition O sorteio
     * @param SortitionEntry $entry A entrada para ser adicionada
     * @return SortitionEntry A entrada adicionada
     */
    public function addEntryToSortition(Sortition $sortition, SortitionEntry $entry): SortitionEntry;

    public function deleteSortition(Sortition $sortition): bool;

    public function getSortitionById($id): null|Sortition;
}
