<?php
namespace Shoukhin\Forte;

use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class ForteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/forte.php');
        // Check if the application is a Laravel OR Lumen instance to properly merge the configuration file.
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('forte.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('forte');
        }
        $this->mergeConfigFrom($source, 'forte');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerFortePHP();
    }

    /**
     * Register Talk class.
     */
    protected function registerFortePHP()
    {
        $this->app->singleton('forte', function () {
            return new Forte();
        });
        $this->app->alias('forte', Forte::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'forte'
        ];
    }
}