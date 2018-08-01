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

            $thisAmount = $each->getCharge();

            $frequentRenterPoints++;

            if (($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $each->getDaysRented() > 1) {
                $frequentRenterPoints++;
            }

            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }

        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned $frequentRenterPoints frequent renter points";

        return $result;
    }


}