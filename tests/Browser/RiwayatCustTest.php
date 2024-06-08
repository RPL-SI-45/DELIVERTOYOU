<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RiwayatCustTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Kunjungi halaman login
                    ->type('email', 'salwa@gmail.com') // Isi email
                    ->type('password', 'salwa123') // Isi kata sandi
                    ->check('input[type="checkbox"]') // Klik checkbox berdasarkan selector
                    ->pause(500) // Tunggu sebentar untuk memastikan JavaScript dieksekusi
                    ->press('Login') // Tekan tombol Login
                    ->assertPathIs('/home'); // Verifikasi bahwa pengguna diarahkan ke halaman home
            // Menggunakan script dan pause di luar chaining untuk memastikan tipe objek yang benar
            $browser->script('window.scrollTo(0, 0);'); // Gulir ke atas halaman
            $browser->clickLink('STATUS')
                    ->assertPathIs('/order/status')
                    ->clickLink('Lihat Riwayat Pesanan')
                    ->assertPathIs('/order/history');
        });
    }
}
    

