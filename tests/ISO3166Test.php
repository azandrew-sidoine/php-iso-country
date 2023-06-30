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

use Drewlabs\ISO\Country\CountryInterface;
use Drewlabs\ISO\Country\ISO3166;
use PHPUnit\Framework\TestCase;

class ISO3166Test extends TestCase
{
    public function test_iso_3166_collection()
    {
        $collection = ISO3166::collection();

        // Assert
        $this->assertInstanceOf(CountryInterface::class, $collection->first());

        // Act
        $first = $collection->first(static function (CountryInterface $country) {
            return 'tg' === strtolower((string) $country);
        });

        // Assert
        $this->assertSame('TG', $first->getAlpha2());
    }
}
