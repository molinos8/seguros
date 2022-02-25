<?php

namespace Tests;


use App\Http\Controllers\BaseController;

use PHPUnit\Framework\TestCase;

class BaseControllerTest extends TestCase
{
    /**
     * Test that baseControllerClass Exists
     *
     * @return void
     */
    public function test_baseControllerClassExists()
    {
        $controller = $this->getMockBuilder(\App\Http\Controllers\BaseController::class)->disableOriginalConstructor()->getMockForAbstractClass();
        $this->assertInstanceOf(\App\Http\Controllers\BaseController ::class, $controller);
    }

    
}
