<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Money\Tests;

use Eophantasy\Money\Dollars;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Eophantasy\Money\Currency\Dollars as DollarsCurrency;

/**
 * Tests for the Dollars class.
 *
 * @internal
 * @covers Eophantasy\Money\Dollars
 */
final class DollarsTest extends TestCase
{
    /**
     * Tests the Dollars string representation.
     * 
     * @return void
     * @covers Eophantasy\Money\Dollars::__toString
     */
    public function test__toString(): void
    {
        $dollars = new Dollars(100, 00);

        $this->assertEquals("$100.0", sprintf("%s", $dollars));
    }

    /**
     * Tests the Dollars currency method.
     * 
     * @return void
     * @covers Eophantasy\Money\Dollars::currency
     */
    public function testCurrency(): void
    {
        $dollars = new Dollars(100, 00);

        $this->assertInstanceOf(DollarsCurrency::class, $dollars->currency());
    }

    /**
     * Tests the Dollars units method.
     * 
     * @return void
     * @covers Eophantasy\Money\Dollars::units
     */
    public function testUnits(): void
    {
        $dollars = new Dollars(100, 00);

        $this->assertEquals(100, $dollars->units());
    }

    /**
     * Tests the Dollars nanos method.
     * 
     * @return void
     * @covers Eophantasy\Money\Dollars::nanos
     */
    public function testNanos(): void
    {
        $dollars = new Dollars(100, 50);

        $this->assertEquals(50, $dollars->nanos());
    }

    public function testNanosThrowsOnNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nanos cannot be negative.");

        (new Dollars(100, -1))->nanos();
    }

    public function testNanosThrowsOnGreaterThan99(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nanos cannot be greater than 99.");

        (new Dollars(100, 100))->nanos();
    }
}
