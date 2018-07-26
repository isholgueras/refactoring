<?php

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

        /** @var Rental $rental */
        foreach ($rentals as $rental) {
            $thisAmount = 0;

            switch ($rental->getMovie()->getPriceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->getDaysRented() > 2) {
                        $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->getDaysRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($rental->getDaysRented() > 3) {
                        $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            $frequentRenterPoints++;

            if (($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $rental->getDaysRented() > 1) {
                $frequentRenterPoints++;
            }

            $result .= "Amount owed is " . $totalAmount . "\n";
            $result .= "You earned $frequentRenterPoints frequent renter points";

            return $result;
        }

    }
}