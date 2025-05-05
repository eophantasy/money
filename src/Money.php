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

use Stringable;
use InvalidArgumentException;
use Eophantasy\Money\Currency\Currency;

/**
 * Abstract class representing a money object.
 */
abstract class Money implements Stringable
{
    /**
     * Creates a new instance of the Money class.
     * 
     * @param int $units The number of units.
     * @param int $nanos The number of nanos.
     */
    public function __construct(
        protected int $units,
        protected int $nanos,
    ) {}

    /**
     * Returns the currency of the money object.
     * 
     * @return Currency
     */
    abstract public function currency(): Currency;

    /**
     * Returns the number of units in the money object.
     * 
     * @return int
     */
    final public function units(): int
    {
        return $this->units;
    }

    /**
     * Returns the number of nanos in the money object.
     * 
     * @return int
     */
    final public function nanos(): int
    {
        if ($this->nanos < 0) {
            throw new InvalidArgumentException("Nanos cannot be negative.");
        }
        if ($this->nanos > 99) {
            throw new InvalidArgumentException("Nanos cannot be greater than 99.");
        }

        return $this->nanos;
    }

    /**
     * Compares this money object with another money object.
     * 
     * @param Money $money The money object to compare with.
     * @return bool True if the two money objects are equal, false otherwise.
     */
    final public function equals(Money $money): bool
    {
        return $this->currency()->code() === $money->currency()->code()
            && $this->units() === $money->units()
            && $this->nanos() === $money->nanos();
    }
}
