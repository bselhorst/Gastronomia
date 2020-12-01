<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccessRightTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAlmoxarifado()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))->visit('/almoxarifado')->assertDontSee('403');
        });
    }

    public function testPatrimonio()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))->visit('/patrimonio')->assertDontSee('403');
        });
    }

    public function testUsuarios()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))->visit('/usuarios')->assertDontSee('403');
        });
    }
}
