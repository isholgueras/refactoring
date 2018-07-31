<?php

namespace VideoClub;

class Rental
{
    /** @var Movie */
    private $movie;

    private $daysRented;

    public function __construct(Movie $movie, $daysRented)
    {
        $this->daysRented = $daysRented;
        $this->movie = $movie;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param Rental $aRental
     * @return float
     */
    public function getCharge()
    {
        $result = 0;

        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($this->getDaysRented() > 2) {
                    $result += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if ($this->getDaysRented() > 3) {
                    $result += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }
        return $result;
    }
}