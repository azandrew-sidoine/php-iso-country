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

use Drewlabs\ISO\Country\ISO3166Country;
use Drewlabs\ISO\Country\ISO3166CountryFactory;
use PHPUnit\Framework\TestCase;

class Iso3166CountryFactoryTest extends TestCase
{
    public function test_iso_3166_factory_create_country()
    {
        $factory = new ISO3166CountryFactory();

        // Act
        $country = $factory->createCountry([
            'name' => 'Togo',
            'label2' => 'TG',
        ]);

        // Assert
        $this->assertInstanceOf(ISO3166Country::class, $country);
        $this->assertSame('TG', $country->getAlpha2());
        $this->assertSame('Togo', $country->getName());
    }

    public function test_iso_3166_factory_create_country_throws_runtime_exception()
    {
        $factory = new ISO3166CountryFactory();

        // Assert
        $this->expectException(InvalidArgumentException::class);

        // Act
        $factory->createCountry([
            'name' => 'Togo',
        ]);
    }
}
