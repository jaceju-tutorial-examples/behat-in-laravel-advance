<?php

use Behat\Gherkin\Node\TableNode;

class ApiFeatureContext extends FeatureContext
{
    /**
     * @var string
     */
    private $apiUrl = '';

    /**
     * @var array
     */
    private $apiBody = [];

    /**
     * @var \Illuminate\Foundation\Testing\TestResponse
     */
    private $response;

    /**
     * @Given API 網址為 :apiUrl
     * @param string $apiUrl
     */
    public function apiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @Given API 附帶資料為
     * @param TableNode $table
     */
    public function apiBody(TableNode $table)
    {
        $this->apiBody = $table->getHash()[0];
    }

    /**
     * @When 以 :method 方法要求 API
     * @param string $method
     */
    public function request(string $method)
    {
        $this->response = $this->json($method, $this->apiUrl, $this->apiBody);
    }

    /**
     * @Then 回傳狀態應為 :statusCode
     * @param int $statusCode
     */
    public function assertStatus(int $statusCode)
    {
        $this->response->assertStatus($statusCode);
    }
}
