<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;


class FunctionsTest extends TestCase
{
    public static function additionalProvider(): array
    {
        return [
            'two positive integers' => [2,3,5],
            'two negative integers' => [-2,-3,-5],
            'positive and negative integers' => [3,-2,1],
             'adding zero' => [3,0,3]
        ];
    }

    #[DataProvider('additionalProvider')]
    public function testAddIntegers(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, addIntegers($a, $b));
    }

    public function testAddingIsCommutative(): void
    {
        $this->assertSame(addIntegers(1, 4), addIntegers(1, 4));
    }
}