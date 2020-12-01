<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccessWithoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAlmoxarifado()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/almoxarifado')->assertSee('403');
        });
    }

    public function testPatrimonio()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/patrimonio')->assertSee('403');
        });
    }

    public function testUsuarios()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/usuarios')->assertSee('403');
        });
    }
}
