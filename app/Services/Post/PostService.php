<?php

declare(strict_types=1);

namespace App\Services\Post;

use App\Services\AbstractService;
use http\Exception\InvalidArgumentException;

class PostService extends AbstractService
{
    public function findByTicket(int $ticketId, int $limit = 10, array $orderBy = []): array
    {
        return $this->repository->findByTicket($ticketId, $limit, $orderBy);
    }

    public function findBy(string $param): array
    {
        return $this->repository->findBy($param);
    }

    public function deleteby(string $param): bool
    {
        return $this->repository->deleteBy($param);
    }

    public function deleteByTicket(int $ticketId): bool
    {
        return $this->repository->deleteByTicket($ticketId);
    }

}
