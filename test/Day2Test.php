<?php

declare(strict_types=1);

namespace Test;

use Advent\Day2\Opcode;
use Advent\Day2\OpcodeFactory;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    public function testTestCasePart1(): void
    {
        $opcodes = [
            [
                '1,0,0,0,99',
                '2,0,0,0,99',
            ], [
                '2,3,0,3,99',
                '2,3,0,6,99',
            ], [
                '2,4,4,5,99,0',
                '2,4,4,5,99,9801',
            ], [
                '1,9,10,3,2,3,11,0,99,30,40,50',
                '3500,9,10,70,2,3,11,0,99,30,40,50',
            ], [
                '1,1,1,4,99,5,6,0,99',
                '30,1,1,4,2,5,6,0,99',
            ],
        ];
        foreach ($opcodes as $test) {
            $opcode = new Opcode($test[0]);
            $this->assertEquals($test[1], $opcode->calculateOpcodes());
        }
    }

    public function testPart1(): void
    {
        $opcode = OpcodeFactory::create();
        $opcode
            ->substituteAddress(1, 12)
            ->substituteAddress(2, 2);
        $opcodes = $opcode->calculateOpcodes();
        $position0 = (int) explode(',', $opcodes)[0];
        $this->assertEquals(3760627, $position0);
    }

    public function testPart2(): void
    {
        $opcode = OpcodeFactory::create();
        $opcode
            ->substituteAddress(1, 71)
            ->substituteAddress(2, 95);
        $opcodes = $opcode->calculateOpcodes();
        $position0 = (int) explode(',', $opcodes)[0];
        $this->assertEquals(19690720, $position0);

        /*$position0 = 0;
        while ($position0 !== 19690720) {
            $opcode = OpcodeFactory::create();
            $noun = random_int(0,100);
            $verb = random_int(0,100);
            $opcode
                ->substituteAddress(1, $noun)
                ->substituteAddress(2, $verb);
            $opcodes = $opcode->calculateOpcodes();
            $position0 = (int) explode(',', $opcodes)[0];
            printf("noun: %d, verb: %d, answer: %d position0: %d\n", $noun, $verb, 100 * $noun + $verb, $position0);
        }
        $this->assertEquals(19690720, $position0);*/
    }
}
