<?php

class ModelFactoryContext extends FeatureContext
{
    /**
     * @Given 存在使用者 :name
     * @param string $name
     */
    public function user(string $name)
    {
        factory(\App\User::class)->create([
            'name' => $name,
        ]);
    }
}
