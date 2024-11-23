<?php

namespace Javfres\Slack;

use RuntimeException;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider implements DeferrableProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The actual provider.
     *
     * @var ServiceProviderLaravel5
     */
    protected $provider;

    /**
     * Instantiate the service provider.
     *
     * @param mixed $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->provider = $this->getProvider();
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        return $this->provider->boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        return $this->provider->register();
    }

    /**
     * Return the service provider for the particular Laravel version.
     *
     * @return mixed
     */
    private function getProvider()
    {
        /** @var Illuminate\Foundation\Application */
        $app = $this->app;

        $version = intval($app::VERSION);

        switch ($version) {
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
              return new SlackServiceProviderLaravel($app);

            default:
              throw new RuntimeException("Your version of Laravel ($version) is not supported");
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['javfres.slack'];
    }
}
