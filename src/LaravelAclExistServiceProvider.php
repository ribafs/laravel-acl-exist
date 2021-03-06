<?php
namespace Ribafs\LaravelAclExist;

use Illuminate\Support\ServiceProvider;

class LaravelAclExistServiceProvider extends ServiceProvider
{    
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //$this->commands();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-acl-exist'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Here only folders with new files and only copy without overwrite
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-acl-exist.php' => config_path('laravel-acl-exist.php'),
        ], 'laravel-acl-exist.config');

        // Directories
        // Publishing the migrations.
        $this->publishes([
            __DIR__.'/../up/database/' => base_path('/database'),
        ], 'laravel-acl-exist.database');

        // Publishing app.
        $this->publishes([
            __DIR__.'/../up/app/' => base_path('/app'),
        ], 'laravel-acl-exist.models');

        // Publishing the resources.
        $this->publishes([
            __DIR__.'/../up/resources/' => base_path('/resources'),
        ], 'laravel-acl-exist.viewss');

        // Publishing commands.
        $this->publishes([
            __DIR__.'/../up/Commands/' => app_path('Console/Commands'),
        ], 'laravel-acl-exist.commands');
  
        // Registering package commands.
        //$this->commands([]);
    }
}
