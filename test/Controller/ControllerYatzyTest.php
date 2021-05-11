<?php

declare(strict_types=1);

namespace Jupiterlander\Controller;

// PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Http\Request;
//use Session;
use Illuminate\Contracts\Session\Session;

use App\Http\Controllers\YatzyController as Yatzy;


/**
 * Test cases for the controller Sample.
 */
class ControllerYatzyTest extends TestCase
{
    /**
     * Try to create the yatzy controller class.
     */
    public function testCreateTheYaztyControllerClass()
    {
        $controller = new Yatzy();
        $this->assertInstanceOf("app\Http\Controllers\YatzyController", $controller);
    }

    /**
     * Check that the controller returns a response.
     *
     */
    public function testYatzyControllerReturnsResponse()
    {   
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class); //https://stackoverflow.com/questions/34357350/how-to-disable-selected-middleware-in-laravel-tests/34357835
        //$controller = new Yatzy();
        //$response = $controller->play();

        $response = $this->get('/yatzy');
        $this->assertEquals(200, $response->status());

        $response = $this->post('/yatzy');
        $this->assertEquals(302, $response->status());

        $response = $this->get('/kill');
        $this->assertEquals(302, $response->status());
    }
}
