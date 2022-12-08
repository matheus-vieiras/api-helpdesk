<?php

declare(strict_types=1);

namespace App\Repositories\Ticket;

use App\Repositories\AbstractRepository;

class TicketRepository extends AbstractRepository
{
    public function findByService(int $serviceId, int $limit, array $orderBy = []): array
    {
        $results = $this->model::where('service_id', $serviceId);

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results->simplePaginate($limit)
            ->appends([
                'order_by' => implode(',', array_keys($orderBy)),
                'limit' => $limit
            ])
            ->toArray();

    }

    public function findByCategory(int $categoryId, int $limit, array $orderBy = []): array
    {
        $results = $this->model::where('categories_id', $categoryId);

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results->simplePaginate($limit)
            ->appends([
                'order_by' => implode(',', array_keys($orderBy)),
                'limit' => $limit
            ])
            ->toArray();

    }

}
