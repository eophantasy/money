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

use Eophantasy\Money\RUB;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Eophantasy\Money\Currency\RUB as RUBCurrency;

/**
 * Tests for the RUB class.
 *
 * @internal
 * @covers Eophantasy\Money\RUB
 */
final class RUBTest extends TestCase
{
    /**
     * Tests the RUB string representation.
     * 
     * @return void
     * @covers Eophantasy\Money\RUB::__toString
     */
    public function test__toString(): void
    {
        $rub = new RUB(100, 00);

        $this->assertEquals("100.00 руб.", sprintf("%s", $rub));
    }

    /**
     * Tests the RUB currency method.
     * 
     * @return void
     * @covers Eophantasy\Money\RUB::currency
     */
    public function testCurrency(): void
    {
        $rub = new RUB(100, 00);

        $this->assertInstanceOf(RUBCurrency::class, $rub->currency());
    }

    /**
     * Tests the RUB units method.
     * 
     * @return void
     * @covers Eophantasy\Money\RUB::units
     */
    public function testUnits(): void
    {
        $rub = new RUB(100, 00);

        $this->assertEquals(100, $rub->units());
    }

    /**
     * Tests the RUB nanos method.
     * 
     * @return void
     * @covers Eophantasy\Money\RUB::nanos
     */
    public function testNanos(): void
    {
        $rub = new RUB(100, 50);

        $this->assertEquals(50, $rub->nanos());
    }

    /**
     * Tests the RUB nanos method with negative value.
     * 
     * @return void
     * @covers Eophantasy\Money\RUB::nanos
     */
    public function testNanosThrowsOnNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nanos cannot be negative.");

        (new RUB(100, -1))->nanos();
    }

    /**
     * Tests the RUB nanos method with value greater than 99.
     * 
     * @return void
     * @covers Eophantasy\Money\RUB::nanos
     */
    public function testNanosThrowsOnGreaterThan99(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nanos cannot be greater than 99.");

        (new RUB(100, 100))->nanos();
    }
}
