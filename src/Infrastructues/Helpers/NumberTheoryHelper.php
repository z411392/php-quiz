<?php

namespace z411392\PhpQuiz\Infrastructues\Helpers;

class NumberTheoryHelper
{
    public function printNumbers(int $n)
    {
        if ($n < 1) return;
        for ($i = 1; $i <= $n; $i++) {
            $isDivisibleBy3 = $i % 3 === 0;
            $isDivisibleBy5 = $i % 5 === 0;
            if ($isDivisibleBy3) {
                if ($isDivisibleBy5) {
                    yield "FizzBuzz";
                    continue;
                } else {
                    yield "Fizz";
                    continue;
                }
            }
            if ($isDivisibleBy5) {
                yield "Buzz";
                continue;
            }
            yield (string)$i;
        }
    }
}
