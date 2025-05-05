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
use Eophantasy\Money\Currency\RUB as RUBCurrency;

/**
 * Represents money in RUB currency.
 */
final class RUB extends Money
{
    /**
     * Returns the currency of the money object.
     * 
     * @return Currency
     */
    public function currency(): Currency
    {
        return new RUBCurrency();
    }

    /**
     * Returns the string representation of the money object.
     * 
     * For example, if the money object represents 100.50 RUB,
     * this method will return "100.50 руб.".
     * 
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            "%d.%s %s",
            $this->units,
            $this->nanos > 9
                ? $this->nanos
                : '0' . $this->nanos,
            $this->currency()->symbol(),
        );
    }
}
