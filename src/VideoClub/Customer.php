<?php

namespace VideoClub;

class Customer
{
    private $name;
    private $rentals = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function getName()
    {
        return $this->name;
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $rentals = $this->rentals;
        $result = "Rental record for " . $this->getName() . "\n";

        /** @var Rental $each */
        foreach ($rentals as $each) {

            $frequentRenterPoints += $each->getFrequentRenterPoints();

            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";
            $totalAmount += $each->getCharge();
        }

        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned $frequentRenterPoints frequent renter points";

        return $result;
    }


}