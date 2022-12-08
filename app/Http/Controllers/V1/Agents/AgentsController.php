<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Agents;

use App\Http\Controllers\AbstractController;
use App\Services\Agents\AgentsService;

class AgentsController extends AbstractController
{
    protected array $searchFields = [
        'name',
        'department',
        'status'
        ];

    public function __construct(AgentsService $service)
    {
        parent::__construct($service);
    }
}
