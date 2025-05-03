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

use Eophantasy\Money\Money;

/**
 * Represents an exchanger for money.
 */
interface Exchangale
{
    /**
     * Exchanges the money object to another currency and returns the new money object.
     */
    public function exchange(): Money;
}
