<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Money\Currency;

/**
 * Represents a currency for a money object.
 * 
 * This interface defines the methods that a currency class should implement.
 */
interface Currency
{
    /**
     * Returns the currency code.
     *
     * @return string The currency code (e.g., "USD", "EUR").
     */
    public function code(): string;

    /**
     * Returns the currency symbol.
     *
     * @return string The currency symbol (e.g., "$", "€").
     */
    public function symbol(): string;
}