<?php

declare(strict_types=1);

namespace App\Services\Ticket;

use App\Services\AbstractService;

class TicketService extends AbstractService
{
    public function findByService(int $serviceId, int $limit, array $orderBy = []): array
    {
        return $this->repository->findByService($serviceId, $limit, $orderBy);
    }

    public function findByCategory(int $categoryId, int $limit, array $orderBy = []): array
    {
        return $this->repository->findByCategory($categoryId, $limit, $orderBy);
    }

}
