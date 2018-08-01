<?php

namespace Tests\VideoClub;

use PHPUnit\Framework\TestCase;
use VideoClub\Movie;

class MovieTest extends TestCase
{
    public function testMovieTitle()
    {
        $movie = new Movie("title", null);
        $this->assertEquals("title", $movie->getTitle());
    }

    public function testMoviePriceCode()
    {
        $movie = new Movie(null, Movie::REGULAR);
        $this->assertEquals(Movie::REGULAR, $movie->getPriceCode());
        $movie->setPriceCode(Movie::CHILDRENS);
        $this->assertEquals(Movie::CHILDRENS, $movie->getPriceCode());
    }
}