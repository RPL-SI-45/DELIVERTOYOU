<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class KategoriAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Kunjungi halaman login
                    ->type('email', 'admin@gmail.com') // Isi email
                    ->type('password', 'admin12345678') // Isi kata sandi
                    ->press('Login') // Tekan tombol Login
                    ->assertPathIs('/kategori_admin') // Verifikasi bahwa pengguna diarahkan ke halaman home
                    ->press('Tambah Kategori')
                    ->assertPathIs('/kategori_admin/create');
            
            // Tunggu hingga elemen tersedia
            $browser->waitFor('input[name="jenis_kategori"]');
            
            // Scroll ke elemen input
            $browser->script('document.querySelector("input[name=\'jenis_kategori\']").scrollIntoView();');
            $browser->pause(500); // Tambahkan jeda untuk memastikan halaman tergulir

            // Isi jenis kategori
            $browser->type('jenis_kategori', 'Makanan')
                    ->press('Simpan')
                    ->assertPathIs('/kategori_admin')
                    ->press('Edit')
                    ->assertPathBeginsWith('/kategori_admin')
                    ->type('jenis_kategori', 'Makanan')
                    ->press('Simpan')
                    ->assertPathIs('/kategori_admin')
                    ->press('Hapus')
                    ->assertPathIs('/kategori_admin');
        });
    }
}
