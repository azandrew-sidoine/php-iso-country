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

class ISO3166
{
    /**
     * creates a collection instance from iso 3166 country data.
     *
     * @throws RuntimeException
     *
     * @return Collection
     */
    public static function collection()
    {
        $jsoLoader = new JsonLoader(new ISO3166CountryFactory());

        return new Collection($jsoLoader->load(__DIR__.'/../data/iso3166.json'));
    }
}
