<?php

namespace Tests\VideoClub;

use PHPUnit\Framework\TestCase;
use VideoClub\Movie;
use VideoClub\Rental;

class RentalTest extends TestCase
{
    public function testDaysRented()
    {
        $emptyMovie = new Movie(null, null);
        $rental = new Rental($emptyMovie, 2);
        $this->assertEquals(2, $rental->getDaysRented());
    }

    public function testMovieRented()
    {
        $emptyMovie = new Movie("title", null);
        $rental = new Rental($emptyMovie, null);
        $this->assertEquals($emptyMovie, $rental->getMovie());
    }

    public function testRegularMovieRentalCharge()
    {
        $regularMovie = new Movie("regular", Movie::REGULAR);
        $oneDayRegularRental = new Rental($regularMovie, 1);
        $oneDayRegularRentalCharge = $oneDayRegularRental->getCharge();
        $this->assertEquals(2, $oneDayRegularRentalCharge);

        $tenDayRegularRental = new Rental($regularMovie, 10);
        $tenDayRegularRentalCharge = $tenDayRegularRental->getCharge();
        $this->assertEquals(14, $tenDayRegularRentalCharge);
    }

    public function testNewReleaseMovieRentalCharge()
    {
        $newReleaseMovie = new Movie("new release", Movie::NEW_RELEASE);
        $oneDayNewReleaseRental = new Rental($newReleaseMovie, 1);
        $oneDayNewReleaseRentalCharge = $oneDayNewReleaseRental->getCharge();
        $this->assertEquals(3, $oneDayNewReleaseRentalCharge);

        $tenDayNewReleaseRental = new Rental($newReleaseMovie, 10);
        $tenDayNewReleaseRentalCharge = $tenDayNewReleaseRental->getCharge();
        $this->assertEquals(30, $tenDayNewReleaseRentalCharge);
    }

    public function testChildrensMovieRentalCharge()
    {
        $ChildrensMovie = new Movie("Childrens", Movie::CHILDRENS);
        $oneDayChildrensRental = new Rental($ChildrensMovie, 1);
        $oneDayChildrensRentalCharge = $oneDayChildrensRental->getCharge();
        $this->assertEquals(1.5, $oneDayChildrensRentalCharge);

        $threeDayChildrensRental = new Rental($ChildrensMovie, 3);
        $threeDayChildrensRentalCharge = $threeDayChildrensRental->getCharge();
        $this->assertEquals(1.5, $threeDayChildrensRentalCharge);

        $fourDayChildrensRental = new Rental($ChildrensMovie, 4);
        $fourDayChildrensRentalCharge = $fourDayChildrensRental->getCharge();
        $this->assertEquals(3, $fourDayChildrensRentalCharge);

        $tenDayChildrensRental = new Rental($ChildrensMovie, 10);
        $tenDayChildrensRentalCharge = $tenDayChildrensRental->getCharge();
        $this->assertEquals(12, $tenDayChildrensRentalCharge);
    }
}