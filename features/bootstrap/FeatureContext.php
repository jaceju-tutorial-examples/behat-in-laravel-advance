<?php

use Behat\Behat\Context\Context;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

abstract class FeatureContext extends TestCase implements Context
{
    use RefreshDatabase;

    protected const ENV_FILE = '.env.behat';

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected static $contextSharedApp;

    /**
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../../bootstrap/app.php';

        $app->loadEnvironmentFrom(self::ENV_FILE);

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @BeforeScenario
     */
    public function before()
    {
        if (!static::$contextSharedApp) {
            parent::setUp();
            static::$contextSharedApp = $this->app;
        } else {
            $this->app = static::$contextSharedApp;
        }

    }

    /**
     * @AfterScenario
     */
    public function after()
    {
        if (static::$contextSharedApp) {
            parent::tearDown();
            static::$contextSharedApp = null;
        }
    }
}