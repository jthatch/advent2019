<?php

declare(strict_types=1);

namespace Test;

use Advent\Day1\FuelCounter;
use Advent\Day1\FuelCounterFactory;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function testTestCasePart1(): void
    {
        $fuelCounter = new FuelCounter([12, 14, 1969, 100756]);

        $this->assertEquals(34241, $fuelCounter->getFuelNeeded());
    }

    public function testPart1(): void
    {
        $fuelCounter = FuelCounterFactory::createPart1();
        $this->assertEquals(3488702, $fuelCounter->getFuelNeeded());
    }

    public function testTestCasePart2(): void
    {
        $fuelCounter = new FuelCounter([12, 1969, 100756]);

        $total = 2 + 966 + 50346;
        $this->assertEquals($total, $fuelCounter->getFullNeededWithFuel());
    }

    public function testPart2(): void
    {
        $fuelCounter = FuelCounterFactory::createPart1();
        $this->assertEquals(5230169, $fuelCounter->getFullNeededWithFuel());
    }
}
