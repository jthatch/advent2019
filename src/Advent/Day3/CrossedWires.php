<?php

declare(strict_types=1);

namespace Advent\Day3;

class CrossedWires
{
    private array $wires;

    public function __construct(array $wires)
    {
        // convert wires to a 2d array
        $this->wires = array_map(static function ($item) {
            return explode(',', $item);
        }, $wires);
    }

    public function getManhattanDistance(): ?int
    {
        $grid          = [];
        $intersections = [];

        foreach ($this->wires as $wire) {
            $wireGrid = [];
            $x        = 0;
            $y        = 0;
            foreach ($wire as $path) {
                // split a path like `R75` into 2 variables
                [$direction, $distance] = [(string) $path[0], (int) substr($path, 1)];

                for ($i = 0; $i < $distance; ++$i) {
                    if ('R' === $direction) {
                        ++$x;
                    } elseif ('L' === $direction) {
                        --$x;
                    } elseif ('U' === $direction) {
                        ++$y;
                    } elseif ('D' === $direction) {
                        --$y;
                    } else {
                        throw new \RuntimeException("Unknown direction: {$direction}");
                    }

                    $coordinate = "$x,$y";

                    // wire found on the grid but not the wires grid
                    if ((0 !== $x && 0 !== $y) && isset($grid[$coordinate]) && !isset($wireGrid[$coordinate])) {
                        $intersections[] = abs($x) + abs($y);
                    }

                    $grid[$coordinate] = $wireGrid[$coordinate] = $coordinate;
                }
            }
        }

        return !empty($intersections)
            ? min($intersections)
            : null;
    }

    public function getLowestCombinedSteps(): ?int
    {
        $grid          = [];
        $intersections = [];

        foreach ($this->wires as $wire) {
            $wireGrid = [];
            $x        = 0;
            $y        = 0;
            $steps    = 0;
            foreach ($wire as $path) {
                // split a path like `R75` into 2 variables
                [$direction, $distance] = [(string) $path[0], (int) substr($path, 1)];

                for ($i = 0; $i < $distance; ++$i) {
                    if ('R' === $direction) {
                        ++$x;
                    } elseif ('L' === $direction) {
                        --$x;
                    } elseif ('U' === $direction) {
                        ++$y;
                    } elseif ('D' === $direction) {
                        --$y;
                    } else {
                        throw new \RuntimeException("Unknown direction: {$direction}");
                    }

                    $coordinate = "$x,$y";
                    ++$steps;

                    // wire found on the grid but not the wires grid
                    if ((0 !== $x && 0 !== $y)
                        && isset($grid[$coordinate])
                        && !isset($wireGrid[$coordinate])
                        && !isset($intersections[$coordinate])) {
                        $intersections[$coordinate] = $grid[$coordinate] + $steps;
                    }

                    $grid[$coordinate] = $wireGrid[$coordinate] = $steps;
                }
            }
        }

        return !empty($intersections)
            ? min($intersections)
            : null;
    }
}
