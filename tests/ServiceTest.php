<?php declare(strict_types=1);

namespace Tests;

// use PHPUnit\Framework\TestCase;
//use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Application;

use Illuminate\Support\ServiceProvider;
use Javfres\Slack\ServiceProvider as SlackServiceProvider;
use Mockery;


final class ServiceTest extends TestCase
{


    /**
     * @var ServiceProvider
     */
    protected $service_provider;

    protected function setUp(): void
    {

        parent::setUp();

        $this->setUpMocks();

        $this->service_provider = new SlackServiceProvider($this->app);

    }

    protected function setUpMocks()
    {

        /*
        $this->application_mock = Mockery::mock(Application::class, function($mock){
            $mock->shouldReceive("VERSION");
        });
        */
    }


    /**
     * @test
     */
    public function it_can_be_constructed()
    {
        $this->assertInstanceOf(ServiceProvider::class, $this->service_provider);

    }

    /**
     * @test
     */
    public function it_can_be_register()
    {
        $this->service_provider->register();
        $this->assertTrue(true);

    }

}