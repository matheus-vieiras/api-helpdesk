<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Services;

use App\Http\Controllers\AbstractController;
use App\Services\Service\ServicesService;

class ServicesController extends AbstractController
{
    protected array $searchFields = [
        'name'
    ];

    public function __construct(ServicesService $service)
    {
        parent::__construct($service);
    }
}
