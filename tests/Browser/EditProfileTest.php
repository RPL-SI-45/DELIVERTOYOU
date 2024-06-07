<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProfileTest extends DuskTestCase
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
                    ->clicklink('PROFILE')
                    ->type('name', 'iqmal Nuriadi')
                    ->type('email', 'inuriadi5@gmail.com')
                    ->type('alamat', 'rapak indah permai')
                    ->type('nomor_telepon', '5555')
                    ->type('old-password', '12345678')
                    ->type('new-password', '87654321')
                    ->type('confirm-password', '87654321')
                    ->press('Update Profile')
                    ->assertPathIs('/home');

        });
    }
}
