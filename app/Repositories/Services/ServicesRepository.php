<?php

namespace App\Repositories\Services;

use App\Repositories\AbstractRepository;

class ServicesRepository extends AbstractRepository
{
    public function create(array $data): array
    {
        return $this->model::firstOrCreate($data)->toArray();
    }

}
