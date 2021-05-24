<?php

declare(strict_types=1);

namespace Jupiterlander\Controller;

// PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Http\Request;
//use Session;
use Illuminate\Contracts\Session\Session;

use App\Http\Controllers\HighScoreController;


/**
 * Test cases for the controller Sample.
 */
class ControllerHighscoreTest extends TestCase
{
    /**
     * Try to create the yatzy controller class.
     */
    public function testCreateTheHighscoreControllerClass()
    {
        $controller = new HighScoreController();
        $this->assertInstanceOf("app\Http\Controllers\HighscoreController", $controller);
    }

    /**
     * Check that the controller returns a response.
     *
     */
    public function testHighscoreControllerReturnsResponse()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class); //https://stackoverflow.com/questions/34357350/how-to-disable-selected-middleware-in-laravel-tests/34357835

        $response = $this->get('yatzy/highscore');
        $this->assertEquals(200, $response->status());

        $response = $this->post('yatzy/highscore');
        $this->assertEquals(302, $response->status());
    }
}
