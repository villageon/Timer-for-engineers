<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepository\UserRepositoryInterface;
use App\Repository\UserRepository\UserRepository;
use App\Repository\MenterRepository\MenterRepositoryInterface;
use App\Repository\MenterRepository\MenterRepository;

class RepositoryServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class, UserRepository::class
        );

        $this->app->bind(
            MenterRepositoryInterface::class, MenterRepository::class
        );
    }

    
    public function boot()
    {
        //
    }
}
