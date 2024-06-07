<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CustomerStatusTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Belum Punya Akun')
                    ->type('email', 'inuriadi5@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->clicklink('STATUS')
                    ->assertSee('Menu')
                    ->clicklink('Detail')
                    ->assertSee('Harga');
                    

        });
    }
}
