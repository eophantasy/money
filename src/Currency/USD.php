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
 * Represents US USD currency for a money object.
 */
final class USD implements Currency
{
    /**
     * The currency code (e.g., "USD").
     * 
     * @var string 
     */
    private string $code;

    /**
     * The currency symbol (e.g., "$").
     * 
     * @var string 
     */
    private string $symbol;

    /**
     * Creates a new instance of the USD currency class.
     */
    public function __construct()
    {
        $this->code = "USD";
        $this->symbol = "$";
    }

    /**
     * Returns the currency code.
     *
     * @return string The currency code (e.g., "USD").
     */
    public function code(): string
    {
        return $this->code;
    }

    /**
     * Returns the currency symbol.
     *
     * @return string The currency symbol (e.g., "$").
     */
    public function symbol(): string
    {
        return $this->symbol;
    }
}