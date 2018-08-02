<?php

namespace VideoClub;

class NewReleasePrice implements Price
{
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function getCharge($daysRented)
    {
        return $daysRented * 3;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        }
        return 1;
    }

}