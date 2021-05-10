<?php

declare(strict_types=1);

namespace Jupiterlander\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

use Http\Controllers\YatzyController;

/**
 * Test cases for the controller Sample.
 */
class ControllerGame21Test extends TestCase
{
    /**
     * Try to create the yatzy controller class.
     */
    public function testCreateTheGame21ControllerClass()
    {
        $controller = new YatzyController();
        $this->assertInstanceOf("Http/Controllers/YatzyController", $controller);
    }
}
