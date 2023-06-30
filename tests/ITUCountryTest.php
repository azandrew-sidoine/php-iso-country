<?php

use Drewlabs\ISO\Country\ITUCountry;
use PHPUnit\Framework\TestCase;

class ITUCountryTest extends TestCase
{

    public function test_itu_getter_methods()
    {
        $country = new ITUCountry('TG', '228', 'Togo');

        $this->assertEquals('TG', $country->getAlpha2());
        $this->assertEquals('228', $country->getCode());
        $this->assertEquals('Togo', $country->getName());
    }

    public function test_itu_country_to_array()
    {
        $country = new ITUCountry('TG', '228', 'Togo');

        $this->assertTrue(array_key_exists('name', $country->toArray()));
        $this->assertEquals('Togo', $country->toArray()['name']);
        
        $this->assertTrue(array_key_exists('alpha2', $country->toArray()));
        $this->assertEquals('TG', $country->toArray()['alpha2']);
        
        $this->assertTrue(array_key_exists('code', $country->toArray()));
        $this->assertEquals('228', $country->toArray()['code']);

    }

}