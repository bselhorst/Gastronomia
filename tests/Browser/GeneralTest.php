<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GeneralTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRedirectLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Faça login com a sua conta');
        });
    }

    // public function testLoginWithUser()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(User::find(1))->visit('/patrimonio/create');
    //         $text = $browser->text('selector');
    //     });
    // }

}
