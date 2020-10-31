<?php

declare(strict_types=1);

namespace Advent\Day4;

class SecureContainerFactory
{
    public static function create(): SecureContainer
    {
        [$min, $max] = array_map('intval',
            explode('-', file_get_contents(__DIR__.'/../../../resources/day4.txt')));

        return new SecureContainer($min, $max);
    }
}
