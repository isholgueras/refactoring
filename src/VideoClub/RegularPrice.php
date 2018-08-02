<?php

namespace VideoClub;

class RegularPrice implements Price
{
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }

    public function getCharge($daysRented)
    {
        $result = 2;
        if ($daysRented > 2) {
            $result += ($daysRented - 2) * 1.5;
        }
        return $result;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        return 1;
    }


}