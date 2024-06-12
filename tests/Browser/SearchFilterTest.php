<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchFilterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'pororo@gmail.com')
                    ->type('password', 'password123')
                    ->check('input[type="checkbox"]') // Klik checkbox berdasarkan selector
                    ->pause(500) // Tunggu sebentar untuk memastikan JavaScript dieksekusi
                    ->press('Login') // Tekan tombol Login
                    ->assertPathIs('/home'); // Verifikasi bahwa pengguna diarahkan ke halaman home

            // Mengisi kolom pencarian dengan benar menggunakan selektor id
            $browser->type('#search-input', 'Ayam Sambal') // Menggunakan id selector
                    ->press('Search')
                    ->select('nama_kategori','Makanan')
                    ->select('nama_kategori','Minuman');
                    

        });
    }
}
