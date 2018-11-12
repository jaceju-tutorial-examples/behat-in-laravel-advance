<?php

use App\Events\UserCreated;
use Illuminate\Support\Facades\Event;

class EventAssertionContext extends FeatureContext
{
    /**
     * @BeforeScenario
     */
    public function setUpFake(): void
    {
        Event::fake();
    }

    /**
     * @When /^應發送事件「已新增用戶」$/
     */
    public function assertDeployStatusCreatedEventDispatched()
    {
        Event::assertDispatched(UserCreated::class, 1);
    }
}
