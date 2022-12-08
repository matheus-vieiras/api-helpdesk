<?php

declare(strict_types=1);

namespace App\Repositories\Post;


use App\Repositories\AbstractRepository;

class PostRepository extends AbstractRepository

{

    public function findByTicket(int $ticketId, int $limit = 10, array $orderBy = []): array
    {
        $results = $this->model::where('ticket_id', $ticketId);

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

    // busca por Id, Owner...
    public function findBy(string $param): array
    {
        $query = $this->model::query();

        if (is_numeric($param)) {
            $posts = $query->findOrFail($param);
        } else {
            $posts = $query->where('owner', $param)
                ->get();
        }

        return $posts->toArray();
    }

    public function deleteBy(string $param): bool
    {
        if (is_numeric($param)) {
            $posts = $this->model::destroy($param);
        } else {
            $posts = $this->model::where('owner', $param)
                ->delete();
        }

        return $posts ? true : false;
    }

    public function deleteByTicket(int $ticketId): bool
    {
        $posts = $this->model::where('ticket_id', $ticketId)
            ->delete();

        return $posts ? true : false;
    }

}
