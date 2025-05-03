<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Money\Exchange;

/**
 * Represents a rate for currency exchange.
 *
 * This class is used to represent the exchange rate between two currencies.
 */
final class Rate
{
    /**
     * Creates a new instance of the Rate class.
     * 
     * @param int $units The number of units in the rate.
     * @param int $nanos The number of nanos in the rate.
     */
    public function __construct(
        protected int $units,
        protected int $nanos,
    ) {}

    /**
     * Returns the number of units in the rate.
     * 
     * For example, if the rate is 100.50, this method will return 100.
     * 
     * @return int The number of units in the rate.
     */
    public function units(): int
    {
        return $this->units;
    }

    /**
     * Returns the number of nanos in the rate.
     * 
     * For example, if the rate is 100.50, this method will return 50.
     * 
     * @return int The number of nanos in the rate.
     */
    public function nanos(): int
    {
        return $this->nanos;
    }
}