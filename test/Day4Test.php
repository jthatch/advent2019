<?php

declare(strict_types=1);

namespace Test;

use Advent\Day4\SecureContainerFactory;
use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase
{
    public function testPart1(): void
    {
        $secureContainer = SecureContainerFactory::create();
        // too high
        $this->assertEquals(1919, $secureContainer->countPossiblePasswords());
    }

    public function testPart2(): void
    {
        $secureContainer = SecureContainerFactory::create();

        $this->assertEquals(1291, $secureContainer->countPossiblePasswordsPart2());
    }
}
