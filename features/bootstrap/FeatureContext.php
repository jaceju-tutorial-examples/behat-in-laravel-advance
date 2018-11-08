<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    use RefreshDatabase;

    /**
     * @BeforeScenario
     */
    public function before()
    {
        putenv('DB_CONNECTION=sqlite');
        putenv('DB_DATABASE=:memory:');
        $this->setUp();
    }

    /**
     * @AfterScenario
     */
    public function after()
    {
        $this->tearDown();
    }

    /**
     * @Given API 網址為 :arg1
     */
    public function apiWangZhiWei($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given API 附帶資料為
     */
    public function apiFuDaiZiLiaoWei(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When 以 :arg1 方法要求 API
     */
    public function yiFangFaYaoQiuApi($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then 回傳狀態應為 :arg1
     */
    public function huiChuanZhuangTaiYingWei($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then 資料表 :arg1 應有資料
     */
    public function ziLiaoBiaoYingYouZiLiao($arg1, TableNode $table)
    {
        throw new PendingException();
    }
}
