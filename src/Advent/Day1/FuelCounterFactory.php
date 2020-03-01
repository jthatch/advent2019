<?php

declare(strict_types=1);

namespace Advent\Day1;

final class FuelCounterFactory
{
    public static function createPart1(): FuelCounter
    {
        $data = array_map('intval',
            file(__DIR__.'/../../../resources/day1.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
        );

        return new FuelCounter($data);
    }
}
