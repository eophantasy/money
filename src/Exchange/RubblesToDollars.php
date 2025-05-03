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

use Eophantasy\Money\Dollars;
use Eophantasy\Money\Rubbles;

/**
 * Class to convert Russian rubbles to US dollars.
 */
final class RubblesToDollars
{
    /**
     * Creates a new instance of the RubblesToDollars class.
     * 
     * @param Rubbles $dollars The rubbles object to be converted.
     * @param Rate $rate The exchange rate object.
     */
    public function __construct(
        private Rubbles $dollars,
        private Rate $rate
    ) {}

    /**
     * Returns the dollars object.
     * 
     * @return Dollars
     */
    public function dollars(): Dollars
    {
        $nanosInUnit = 100;
        
        $totalRubles = $this->dollars->units() + ($this->dollars->nanos() / $nanosInUnit);
        $rate = $this->rate->units() + ($this->rate->nanos() / $nanosInUnit);

        $totalDollars = $totalRubles / $rate;

        $units = (int) $totalDollars;
        $nanos = (int) round(($totalDollars - $units) * $nanosInUnit);

        return new Dollars($units, $nanos);
    }
}
