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

use Eophantasy\Money\Rubles;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Eophantasy\Money\Currency\Rubles as RublesCurrency;

/**
 * Tests for the Rubles class.
 *
 * @internal
 * @covers Eophantasy\Money\Rubles
 */
final class RublesTest extends TestCase
{
    /**
     * Tests the Rubles string representation.
     * 
     * @return void
     * @covers Eophantasy\Money\Rubles::__toString
     */
    public function test__toString(): void
    {
        $rubles = new Rubles(100, 00);

        $this->assertEquals("100.0 руб.", sprintf("%s", $rubles));
    }

    /**
     * Tests the Rubles currency method.
     * 
     * @return void
     * @covers Eophantasy\Money\Rubles::currency
     */
    public function testCurrency(): void
    {
        $rubles = new Rubles(100, 00);

        $this->assertInstanceOf(RublesCurrency::class, $rubles->currency());
    }

    /**
     * Tests the Rubles units method.
     * 
     * @return void
     * @covers Eophantasy\Money\Rubles::units
     */
    public function testUnits(): void
    {
        $rubles = new Rubles(100, 00);

        $this->assertEquals(100, $rubles->units());
    }

    /**
     * Tests the Rubles nanos method.
     * 
     * @return void
     * @covers Eophantasy\Money\Rubles::nanos
     */
    public function testNanos(): void
    {
        $rubles = new Rubles(100, 50);

        $this->assertEquals(50, $rubles->nanos());
    }

    public function testNanosThrowsOnNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nanos cannot be negative.");

        (new Rubles(100, -1))->nanos();
    }

    public function testNanosThrowsOnGreaterThan99(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nanos cannot be greater than 99.");

        (new Rubles(100, 100))->nanos();
    }
}
