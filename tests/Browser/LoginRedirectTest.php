<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginRedirectTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testMain()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Faça login com a sua conta');
        });
    }
}
