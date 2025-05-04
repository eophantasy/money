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

use Eophantasy\Money\Money;
use InvalidArgumentException;
use Eophantasy\Money\Currency\Currency;
use Eophantasy\Money\Currency\USD as CurrencyUSD;

/**
 * Represents a money object in US USD.
 *
 * This class implements the Money interface and provides methods to
 * access the currency, units, and nanos of the money object.
 */
final class USD implements Money
{
    /**
     * Creates a new instance of the USD class.
     * 
     * @param int $units The number of units.
     * @param int $nanos The number of nanos.
     * @param Currency $currency The currency of the money object.
     */
    public function __construct(
        private int $units,
        private int $nanos,
    ) {}

    /**
     * Returns the currency of the money object.
     * 
     * @return Currency
     */
    public function currency(): Currency
    {
        return new CurrencyUSD();
    }

    /**
     * Returns the number of units in the money object.
     * 
     * For example, if the money object represents 100.50 USD,
     * this method will return 100.
     * 
     * @return int
     */
    public function units(): int
    {
        return $this->units;
    }

    /**
     * Returns the number of nanos in the money object.
     * 
     * For example, if the money object represents 100.50 USD,
     * this method will return 50 in cents value.
     * 
     * @return int
     */
    public function nanos(): int
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
     * Returns a string representation of the money object.
     * 
     * For example, if the money object represents 100.50 USD,
     * this method will return "$100.50".
     * 
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            '%s%d.%s',
            $this->currency()->symbol(),
            $this->units,
            $this->nanos > 9
                ? $this->nanos . '0s'
                : '0' . $this->nanos,
        );
    }
}
