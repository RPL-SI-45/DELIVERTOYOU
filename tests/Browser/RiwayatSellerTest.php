<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RiwayatSellerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Kunjungi halaman login
                    ->type('email', 'aulia@gmail.com') // Isi email
                    ->type('password', 'aulia123') // Isi kata sandi
                    ->check('input[type="checkbox"]') // Klik checkbox berdasarkan selector
                    ->pause(500) // Tunggu sebentar untuk memastikan JavaScript dieksekusi
                    ->press('Login') // Tekan tombol Login
                    ->assertPathIs('/seller/dash')
                    ->clickLink('Riwayat Pesanan')
                    ->assertPathIs('/seller/orderhistory')
                    ;
        });
    }
}
