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

    /**
     * Remove uma entrada de um sorteio
     *
     * @param SortitionEntry $entry A entrada a ser removida
     * @return bool Se a entrada foi removida ou não
     */
    public function removeSortitionEntry(SortitionEntry $entry): bool;


    /**
     * Executa um sorteio
     *
     * @param Sortition $sortition O sorteio a ser executado
     * @param array $options Opções referentes ao modo que o sorteio vai ser executado
     * @return Collection Uma coleção contendo as entradas sorteadas
     */
    public function executeSortition(Sortition $sortition, array $options): Collection;
}
