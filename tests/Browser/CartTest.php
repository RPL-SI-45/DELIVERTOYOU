<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CartTest extends DuskTestCase
{
   
    /**
     * Test adding an item to the cart.
     *
     * @return void
     */
    public function testAddToCart()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home');
                    
                   
                   
        });
    }
}
