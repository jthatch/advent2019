<?php

declare(strict_types=1);

namespace Advent\Day2;

final class OpcodeFactory
{
    public static function create(): Opcode
    {
        $data = file_get_contents(__DIR__.'/../../../resources/day2.txt');

        return new Opcode($data);
    }
}
