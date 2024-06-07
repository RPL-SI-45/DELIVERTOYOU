<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register') // Ensure this is the correct URL for the registration page
                    ->type('name', 'Pororo')
                    ->type('tanggal_lahir', '2000-01-01')
                    ->type('email', 'pororo@gmail.com')
                    ->type('nomor_telepon', '08215295353')
                    ->type('alamat', 'Cacuk')
                    ->type('password', 'password123')
                    ->type('password_confirmation', 'password123')
                    ->select('role', 'customer')
                    ->press('Register'); // Ensure this matches the text of the submit button on your form
                    
                    
        });
    }
}