<?php

declare(strict_types=1);

namespace Advent\Day4;

class SecureContainer
{
    private int $min;
    private int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function countPossiblePasswords(): int
    {
        $count = 0;
        for ($i = $this->min; $i <= $this->max; ++$i) {
            if (preg_match('/^(?=\d{6}$)0*1*2*3*4*5*6*7*8*9*$/', (string) $i)
                && preg_match('/(\d)\1+/', (string) $i)) {
                ++$count;
            }
        }

        return $count;
    }

    public function countPossiblePasswordsPart2(): int
    {
        $possiblePasswords = [];

        for ($i = $this->min; $i < $this->max; $i++) {
            $code = str_pad((string) $i, 6, '0', STR_PAD_LEFT);

            // Check for 6 equal or ascending numbers
            if (preg_match('/^(?=\d{6}$)0*1*2*3*4*5*6*7*8*9*$/', $code)) {
                // Check for the presence of 1 or more adjacent repeating digits
                $matches = [];
                if (preg_match_all('/(\d)\1+/', $code, $matches)) {
                    foreach ($matches[0] as $match) {
                        if (strlen($match) === 2) {
                            $possiblePasswords[] = $code;

                            break;
                        }
                    }
                }
            }
        }

        return count($possiblePasswords);
    }
}
