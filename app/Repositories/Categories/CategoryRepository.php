<?php

namespace App\Repositories\Categories;

use App\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    public function create(array $data): array
    {
        return $this->model::firstOrCreate($data)->toArray();
    }
}
