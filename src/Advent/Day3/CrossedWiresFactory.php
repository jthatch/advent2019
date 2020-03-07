<?php

declare(strict_types=1);

namespace Advent\Day3;

class CrossedWiresFactory
{
    public static function create(): CrossedWires
    {
        $data = file(__DIR__.'/../../../resources/day3.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        return new CrossedWires($data);
    }
}
