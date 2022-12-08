<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Agents\Agents;
use App\Repositories\Agents\AgentsRepository;
use App\Services\Agents\AgentsService;
use Illuminate\Support\ServiceProvider;


class AgentsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AgentsService::class, function ($app) {
            return new AgentsService(new AgentsRepository(new Agents()));
        });
    }
}
