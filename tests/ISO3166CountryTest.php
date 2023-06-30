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
use PHPUnit\Framework\TestCase;

class ISO3166CountryTest extends TestCase
{
    public function test_itu_getter_methods()
    {
        $country = new ISO3166Country('TG', 'Togo');

        $this->assertSame('TG', $country->getAlpha2());
        $this->assertSame('Togo', $country->getName());
    }

    public function test_itu_country_to_array()
    {
        $country = new ISO3166Country('TG', 'Togo', null, 228);

        $this->assertArrayHasKey('name', $country->toArray());
        $this->assertSame('Togo', $country->toArray()['name']);

        $this->assertArrayHasKey('label2', $country->toArray());
        $this->assertSame('TG', $country->toArray()['label2']);

        $this->assertArrayHasKey('label', $country->toArray());
        $this->assertNull($country->toArray()['label']);

        $this->assertArrayHasKey('numeric', $country->toArray());
        $this->assertSame(228, $country->toArray()['numeric']);

    }
}
