<?php

declare(strict_types=1);

namespace Advent\Day2;

class Opcode
{
    private array $program;

    private int $position = 0;

    public function __construct(string $opcodes)
    {
        $this->program = array_map('intval', explode(',', $opcodes));
    }

    public function substituteAddress(int $position, int $value)
    {
        $this->program[$position] = $value;

        return $this;
    }

    public function calculateOpcodes(): string
    {
        $programSize = count($this->program);
        for ($i = 0; $i < $programSize; $i += 4) {
            $opcode = $this->program[$i];

            if (99 === $opcode) {
                break;
            }

            $input1 = $this->program[$i + 1];
            $input2 = $this->program[$i + 2];
            $output = $this->program[$i + 3];

            if (1 === $opcode) {
                $this->program[$output] = $this->program[$input1] + $this->program[$input2];
            } elseif (2 === $opcode) {
                $this->program[$output] = $this->program[$input1] * $this->program[$input2];
            } else {
                throw new \RuntimeException("Invalid Opcode: {$opcode}");
            }
        }

        return implode(',', $this->program);
    }
}
