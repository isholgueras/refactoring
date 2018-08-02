<?php

namespace VideoClub;

interface Price
{
    public function getPriceCode();
    public function getCharge($daysRented);
    public function getFrequentRenterPoints($daysRented);
}