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
 * Represents RUB currency for a money object.
 */
final class RUB implements Currency
{
    /**
     * The currency code (e.g., "RUB").
     * 
     * @var string 
     */
    private string $code;

    /**
     * The currency symbol (e.g., "руб.").
     * 
     * @var string 
     */
    private string $symbol;

    /**
     * Creates a new instance of the RUB class.
     */
    public function __construct()
    {
        $this->code = "RUB";
        $this->symbol = "руб.";
    }

    /**
     * Returns the currency code.
     *
     * @return string The currency code (e.g., "RUB").
     */
    public function code(): string
    {
        return $this->code;
    }

    /**
     * Returns the currency symbol.
     *
     * @return string The currency symbol (e.g., "руб.").
     */
    public function symbol(): string
    {
        return $this->symbol;
    }
}