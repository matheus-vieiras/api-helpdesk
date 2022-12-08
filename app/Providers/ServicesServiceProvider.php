<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Services\Services;
use App\Repositories\Services\ServicesRepository;
use App\Services\Service\ServicesService;
use Illuminate\Support\ServiceProvider;


class ServicesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ServicesService::class, function ($app) {
            return new ServicesService(new ServicesRepository(new Services()));
        });
    }
}
