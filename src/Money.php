<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Money;

use Eophantasy\Money\Currency\Currency;
use Stringable;

/**
 * Represents a money object.
 * 
 * This interface defines the methods that a money class should implement.
 */
interface Money extends Stringable
{
    /**
     * Returns the currency of the money object.
     * 
     * @return Currency
     */
    public function currency(): Currency;

    /**
     * Returns the number of units in the money object.
     * 
     * @return int
     */
    public function units(): int;

    /**
     * Returns the number of nanos in the money object.
     * 
     * @return int
     */
    public function nanos(): int;
}
