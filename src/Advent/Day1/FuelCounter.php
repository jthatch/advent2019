<?php

declare(strict_types=1);

namespace Advent\Day1;

class FuelCounter
{
    protected array $objects;

    public function __construct(array $objects)
    {
        $this->objects = $objects;
    }

    public function getFuelNeeded(): int
    {
        return array_reduce($this->objects, fn ($totalFuel, $mass) => $totalFuel + $this->calculateFuelFromMass($mass), 0);
    }

    public function getFullNeededWithFuel(): int
    {
        return (int) array_reduce($this->objects, function ($totalFuel, $mass) {
            $fuel = $massFuel = $this->calculateFuelFromMass($mass);
            do {
                $fuel = $this->calculateFuelFromMass($fuel);
                $massFuel += $fuel;
            } while ($fuel > 0);

            return $totalFuel + $massFuel;
        }, 0);
    }

    protected function calculateFuelFromMass($mass): int
    {
        $mass = (int) $mass;

        return (int) max(0, floor($mass / 3) - 2);
    }
}
