<?php

namespace App\Repositories;

interface RepositoryInterface
{

    // cria um registro e retorna o que foi criado.
    public function create(array $data): array;

    // ordenar por data ou nome e etc...
    public function findAll(int $limit = 10, array $orderBy = []): array;

    public function findOneBy(int $id): array;

    public function editBy(string $param, array $data): bool; // executou ou ñ

    public function delete(int $id): bool;

    // para buscar algum campo específico por nome ou algo do tipo
    public function searchBy(
        string $string,
        array  $searchFields, // os campos para realizar a busca.
        int    $limit = 10,
        array  $orderBy = []
    ): array;
}
