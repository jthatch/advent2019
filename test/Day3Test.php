<?php

declare(strict_types=1);

namespace Test;

use Advent\Day3\CrossedWires;
use Advent\Day3\CrossedWiresFactory;
use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    public function testExamplesPart1(): void
    {
        $examples = [
            [
                'input' => [
                    'R75,D30,R83,U83,L12,D49,R71,U7,L72',
                    'U62,R66,U55,R34,D71,R55,D58,R83',
                ],
                'answer' => 159,
            ],
            [
                'input' => [
                    'R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51',
                    'U98,R91,D20,R16,D67,R40,U7,R15,U6,R7',
                ],
                'answer' => 135,
            ],
            [
                'input' => [
                    'R98',
                    'U98',
                ],
                'answer' => null,
            ],
        ];

        foreach ($examples as $example) {
            $crossedWires = new CrossedWires($example['input']);
            $this->assertEquals($example['answer'], $crossedWires->getManhattanDistance());
        }
    }

    public function testPart1(): void
    {
        $crossedWires = CrossedWiresFactory::create();
        $this->assertEquals(731, $crossedWires->getManhattanDistance());
    }

    public function testExamplesPart2(): void
    {
        $examples = [
            [
                'input' => [
                    'R75,D30,R83,U83,L12,D49,R71,U7,L72',
                    'U62,R66,U55,R34,D71,R55,D58,R83',
                ],
                'answer' => 610,
            ],
            [
                'input' => [
                    'R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51',
                    'U98,R91,D20,R16,D67,R40,U7,R15,U6,R7',
                ],
                'answer' => 410,
            ],
        ];

        foreach ($examples as $example) {
            $crossedWires = new CrossedWires($example['input']);
            $this->assertEquals($example['answer'], $crossedWires->getLowestCombinedSteps());
        }
    }

    public function testPart2(): void
    {
        $crossedWires = CrossedWiresFactory::create();
        $this->assertEquals(5672, $crossedWires->getLowestCombinedSteps());
    }
}
