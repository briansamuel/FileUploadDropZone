<?php

namespace VanVu\FileUploadDropZone;

use Illuminate\Support\ServiceProvider as Service;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends Service
{

	private $namespace = "VanVu";

    private $prefix = "vanvu";

	public function boot()
    {
        //
        $this->routes();
        //$this->loadRoutesFrom(__DIR__.'/routes.php');
        // $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'FileUploadDropZone');

        $this->publishes([__DIR__.'/views' => base_path('resources/views/vendor/FileUploadDropZone'),]);

    }

    public function routes() 
    {
        if(file_exists(__DIR__. "/routes.php")) {
            Route::prefix($this->prefix)
            ->namespace($this->namespace)
            ->group(__DIR__. "/routes.php");
        }
    }

}