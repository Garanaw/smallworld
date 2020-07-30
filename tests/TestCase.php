<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;
use Illuminate\View\View;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    protected function getDataFromResponse(TestResponse $response)
    {
        /** @var View */
        return $response->getOriginalContent()->getData();
        
    }
}
