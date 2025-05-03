<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Money\Test\Exchange;

use Eophantasy\Money\Exchange\Rate;
use Eophantasy\Money\Exchange\RubblesToDollars;
use Eophantasy\Money\Rubbles;

/**
 * Class to test the conversion of rubbles to dollars.
 * 
 * @covers \Eophantasy\Money\Exchange\RubblesToDollars
 */
final class RubblesToDollarsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test the conversion of rubbles to dollars.
     * 
     * @return void
     * @covers \Eophantasy\Money\Exchange\RubblesToDollars::dollars
     */
    public function testDollars(): void
    {
        $rate = new Rate(82, 70);
        foreach (
            [
                [100, 0, 1, 21],
                [1000, 0, 12, 9],
                [1_200_000, 0, 14510, 28],
                [1_200_500, 0, 14516, 32],
            ] as [
                $rubblesUnits,
                $rubblesNanos,
                $dollarsUnits,
                $dollarsNanos,
            ]
        ) {
            $dollars = (new RubblesToDollars(
                new Rubbles($rubblesUnits, $rubblesNanos),
                $rate
            ))->dollars();

            $this->assertEquals($dollarsUnits, $dollars->units());
            $this->assertEquals($dollarsNanos, $dollars->nanos());
        }
    }
}
