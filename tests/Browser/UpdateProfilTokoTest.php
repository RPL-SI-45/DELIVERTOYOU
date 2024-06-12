<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateProfilTokoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'alfianasri@gmail.com')
                    ->type('password', '12345678')
                    ->check('input[type="checkbox"]') // Klik checkbox berdasarkan selector
                    ->pause(500) // Tunggu sebentar untuk memastikan JavaScript dieksekusi
                    ->press('Login') // Tekan tombol Login
                    ->assertPathIs('/seller/dash'); // Verifikasi bahwa pengguna diarahkan ke halaman Dashboard Seller

            // Mengupdate profil toko
            $browser->clickLink('Edit Profil Toko')
                    ->assertPathBeginsWith('/seller')
                    ->type('nama_toko', 'Warkop')
                    ->type('alamat_toko', 'Sukabirus')
                    ->attach('#qrcode', __DIR__.'/files/download.jpg')
                    ->press('Update Profile');

                    

        });
    }
}
