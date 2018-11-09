<?php

use Behat\Behat\Context\Context;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    use RefreshDatabase;

    protected const ENV_FILE = '.env.behat';

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
        $this->setUp();
    }

    /**
     * @AfterScenario
     */
    public function after()
    {
        $this->tearDown();
    }
}
