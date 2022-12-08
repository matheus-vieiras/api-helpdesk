<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category\Category;
use App\Repositories\Categories\CategoryRepository;
use App\Services\Categories\CategoryService;
use Illuminate\Support\ServiceProvider;


class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService(new CategoryRepository(new Category()));
        });
    }
}
