<?php

namespace VideoClub;

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    private $title;
    /** @var Price */
    private $price;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getPriceCode()
    {
        return $this->price->getPriceCode();
    }

    public function setPriceCode($arg)
    {
        switch ($arg) {
            case self::REGULAR:
                $this->price = new RegularPrice();
                break;
            case self::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            case self::CHILDRENS:
                $this->price = new ChildrensPrice();
                break;
            default:
                throw new \InvalidArgumentException("Incorrect Price Code");
        }
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
        return $this->price->getCharge($daysRented);
    }

    public function getFrequentRenterPoints($daysRented)
    {
        return $this->price->getFrequentRenterPoints($daysRented);
    }

}