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
}