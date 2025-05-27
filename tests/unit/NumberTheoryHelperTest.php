<?php

use PHPUnit\Framework\TestCase;
use z411392\PhpQuiz\Infrastructues\Helpers\NumberTheoryHelper;

class NumberTheoryHelperTest extends TestCase
{
    public function testPrintNumbers()
    {
        $helper = new NumberTheoryHelper();
        $got = iterator_to_array($helper->printNumbers(15));
        $expected = [
            "1",
            "2",
            "Fizz",
            "4",
            "Buzz",
            "Fizz",
            "7",
            "8",
            "Fizz",
            "Buzz",
            "11",
            "Fizz",
            "13",
            "14",
            "FizzBuzz",
        ];
        $this->assertEquals($expected, $got);
    }
}
