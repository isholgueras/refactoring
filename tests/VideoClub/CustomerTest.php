<?php

namespace Tests\VideoClub;

use PHPUnit\Framework\TestCase;
use VideoClub\Customer;
use VideoClub\Movie;
use VideoClub\Rental;

class CustomerTest extends TestCase
{
    public function testCustomersName()
    {
        $customer = new Customer("Name");
        $this->assertEquals("Name", $customer->getName());
    }

    public function testCustomerOneRentalNewReleaseStatement()
    {
        $customer = new Customer("Name");

        $childrenMovie = new Movie("Children", Movie::CHILDRENS);
        $oneDayChildrenRental = new Rental($childrenMovie, 1);
        $customer->addRental($oneDayChildrenRental);
        $newReleaseMovie = new Movie("New Release", Movie::NEW_RELEASE);
        $tenDayNewReleaseRental = new Rental($newReleaseMovie, 10);
        $customer->addRental($tenDayNewReleaseRental);

        $expectedResult = "Rental record for Name\n";
        $expectedResult .= "\tChildren\t1.5\n";
        $expectedResult .= "\tNew Release\t30\n";
        $expectedResult .= "Amount owed is 31.5\n";
        $expectedResult .= "You earned 3 frequent renter points";
        $this->assertEquals($expectedResult, $customer->statement());

    }
}