<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Categories;

use App\Http\Controllers\AbstractController;
use App\Services\Categories\CategoryService;


class CategoryController extends AbstractController
{
    protected array $searchFields = [
        'name'
    ];

    public function __construct(CategoryService $service)
    {
        parent::__construct($service);
    }
}
