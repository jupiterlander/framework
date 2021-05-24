<?php

declare(strict_types=1);

namespace Jupiterlander\Controller;

// PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Http\Request;
//use Session;
use Illuminate\Contracts\Session\Session;

use App\Http\Controllers\BookController;


/**
 * Test cases for the controller Sample.
 */
class ControllerBookTest extends TestCase
{
    /**
     * Try to create the yatzy controller class.
     */
    public function testCreateTheHighscoreControllerClass()
    {
        $controller = new BookController();
        $this->assertInstanceOf("app\Http\Controllers\BookController", $controller);
    }

    /**
     * Check that the controller returns a response.
     *
     */
    public function testBookControllerReturnsResponse()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class); //https://stackoverflow.com/questions/34357350/how-to-disable-selected-middleware-in-laravel-tests/34357835

        $response = $this->get('book');
        $this->assertEquals(200, $response->status());
    }
}
