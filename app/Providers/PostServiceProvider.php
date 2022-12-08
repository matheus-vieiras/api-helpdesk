<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Post\Post;
use App\Repositories\Post\PostRepository;
use App\Services\Post\PostService;
use Illuminate\Support\ServiceProvider;


class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PostService::class, function ($app) {
            return new PostService(new PostRepository(new Post()));
        });
    }
}
