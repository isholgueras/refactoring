<?php

namespace VideoClub;

class Customer
{
    private $name;
    /**
     * @var Rental[]
     */
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
        $result = "Rental record for " . $this->getName() . "\n";

        /** @var Rental $each */
        foreach ($this->rentals as $each) {
            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getMovie()->getCharge($each->getDaysRented()) . "\n";
        }

        $result .= "Amount owed is " . $this->getTotalCharge() . "\n";
        $result .= "You earned " . $this->getTotalFrequentRenterPoints() . " frequent renter points";

        return $result;
    }

    /**
     * Calculate the total charge
     *
     * @return int
     */
    public function getTotalCharge()
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result += $rental->getMovie()->getCharge($rental->getDaysRented());
        }
        return $result;
    }

    /**
     * Calculate all frequent renter points
     *
     * @return int
     */
    public function getTotalFrequentRenterPoints()
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result += $rental->getMovie()->getFrequentRenterPoints($rental->getDaysRented());
        }
        return $result;
    }


}