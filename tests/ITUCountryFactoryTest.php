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

use Drewlabs\ISO\Country\ITUCountry;
use Drewlabs\ISO\Country\ITUCountryFactory;
use PHPUnit\Framework\TestCase;

class ITUCountryFactoryTest extends TestCase
{
    public function test_itu_factory_create_country()
    {
        $factory = new ITUCountryFactory();

        // Act
        $country = $factory->createCountry([
            'name' => 'Togo',
            'alpha2' => 'TG',
            'code' => '228',
        ]);

        // Assert
        $this->assertInstanceOf(ITUCountry::class, $country);
        $this->assertSame('TG', $country->getAlpha2());
        $this->assertSame('Togo', $country->getName());
    }

    public function test_itu_factory_create_country_throws_runtime_exception()
    {
        $factory = new ITUCountryFactory();

        // Assert
        $this->expectException(InvalidArgumentException::class);

        // Act
        $factory->createCountry([
            'name' => 'Togo',
            'code' => '228',
        ]);
    }
}
