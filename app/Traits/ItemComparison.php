<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait ItemComparison
{
    public function areCartItemsSameAsPemesananItems(Collection $cartItems, Collection $pemesananItems)
    {
        if (count($cartItems) != count($pemesananItems)) {
            return false;
        }

        foreach ($cartItems as $cartItem) {
            $match = $pemesananItems->first(function ($pemesananItem) use ($cartItem) {
                return $pemesananItem->menu_id == $cartItem->menu_id && $pemesananItem->quantity == $cartItem->quantity;
            });

            if (!$match) {
                return false;
            }
        }

        return true;
    }
}
