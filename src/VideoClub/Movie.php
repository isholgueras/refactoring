<?php

namespace VideoClub;

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    private $title;
    private $priceCode;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode()
    {
        return $this->priceCode;
    }

    public function setPriceCode($priceCode)
    {
        $this->priceCode = $priceCode;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        $result = 0;

        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2) {
                    $result += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if ($daysRented > 3) {
                    $result += ($daysRented - 3) * 1.5;
                }
                break;
        }
        return $result;
    }

}