<?php

namespace App\Repositories\Agents;

use App\Repositories\AbstractRepository;

class AgentsRepository extends AbstractRepository
{
    public function create(array $data): array
    {
        return $this->model::firstOrCreate($data)->toArray();
    }
}

