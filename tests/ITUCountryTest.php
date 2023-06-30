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
use PHPUnit\Framework\TestCase;

class ITUCountryTest extends TestCase
{
    public function test_itu_getter_methods()
    {
        $country = new ITUCountry('TG', '228', 'Togo');

        $this->assertSame('TG', $country->getAlpha2());
        $this->assertSame('228', $country->getCode());
        $this->assertSame('Togo', $country->getName());
    }

    public function test_itu_country_to_array()
    {
        $country = new ITUCountry('TG', '228', 'Togo');

        $this->assertArrayHasKey('name', $country->toArray());
        $this->assertSame('Togo', $country->toArray()['name']);

        $this->assertArrayHasKey('alpha2', $country->toArray());
        $this->assertSame('TG', $country->toArray()['alpha2']);

        $this->assertArrayHasKey('code', $country->toArray());
        $this->assertSame('228', $country->toArray()['code']);

    }
}
