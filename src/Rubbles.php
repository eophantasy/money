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
use Eophantasy\Money\Currency\RubblesCurrency;

/**
 * Represents money in rubbles currency.
 */
final class Rubbles implements Money
{
    /**
     * The currency instance.
     *
     * @var Currency
     */
    private Currency $currency;

    /**
     * Creates a new instance of the Rubbles class.
     * 
     * @param int $units The number of units.
     * @param int $nanos The number of nanos.
     */
    public function __construct(
        private int $units,
        private int $nanos,
    ) {
        $this->currency = new RubblesCurrency();
    }

    /**
     * Returns the currency of the money object.
     * 
     * @return Currency
     */
    public function currency(): Currency
    {
        return $this->currency;
    }

    /**
     * Returns the number of units in the money object.
     * 
     * For example, if the money object represents 100.50 rubles,
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
     * For example, if the money object represents 100.50 rubles,
     * this method will return 50 in kopeks value.
     * 
     * @return int
     */
    public function nanos(): int
    {
        return $this->nanos;
    }

    /**
     * Returns the string representation of the money object.
     * 
     * For example, if the money object represents 100.50 rubles,
     * this method will return "100.50 руб.".
     * 
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            "%d.%d %s",
            $this->units(),
            $this->nanos(),
            $this->currency()->symbol(),
        );
    }
}
