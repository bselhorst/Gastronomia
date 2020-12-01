<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccessWrongTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAlmoxarifado()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))->visit('/almoxarifado')->assertSee('403');
        });
    }

    public function testPatrimonio()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))->visit('/patrimonio')->assertSee('403');
        });
    }

    public function testUsuarios()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))->visit('/usuarios')->assertSee('403');
        });
    }
}
