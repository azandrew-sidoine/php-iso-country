<?php

declare(strict_types=1);

/*
 * This file is part of the drewlabs namespace.
 *
 * (c) Sidoine Azandrew <azandrewdevelopper@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drewlabs\ISO\Country;

interface CountryInterface
{
    /**
     * returns a string value of the country.
     *
     * @return string
     */
    public function __toString();

    /**
     * returns the `alpha 2` iso code for the country.
     *
     * @return string
     */
    public function getAlpha2();

    /**
     * returns the `name` iso code for the country.
     *
     * @return string
     */
    public function getName();
}
