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
use Eophantasy\Money\Currency\Currency;
use Eophantasy\Money\Currency\USD as CurrencyUSD;

/**
 * Represents a money object in US USD.
 *
 * This class implements the Money interface and provides methods to
 * access the currency, units, and nanos of the money object.
 */
final class USD extends Money
{
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
