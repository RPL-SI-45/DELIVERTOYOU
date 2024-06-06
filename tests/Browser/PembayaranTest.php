<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PembayaranTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->assertPathIs('/register')
                    ->type('name', 'iqmal nuriadi')
                    ->type('tanggal_lahir', '05/05/2003')
                    ->type('email', 'inuriadi@gmail.com')
                    ->type('nomor_telepon', '081224249920')
                    ->type('alamat', 'PBB blok i')
                    ->type('password', '12345678')
                    ->type('password_confirmation', '12345678')
                    ->press('Register')
                    ->assertPathIs('/login')
                    ->type('email', 'inuriadi@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
