<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ToDoRepository;
use App\Repositories\ToDoRepositoryEloquent;

class ToDoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(ToDoRepository::class, ToDoRepositoryEloquent::class);
    }
}

