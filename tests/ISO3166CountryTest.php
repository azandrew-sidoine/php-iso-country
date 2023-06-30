<?php

use Drewlabs\ISO\Country\ISO3166Country;
use PHPUnit\Framework\TestCase;

class ISO3166CountryTest extends TestCase
{

    public function test_itu_getter_methods()
    {
        $country = new ISO3166Country('TG', 'Togo');

        $this->assertEquals('TG', $country->getAlpha2());
        $this->assertEquals('Togo', $country->getName());
    }

    public function test_itu_country_to_array()
    {
        $country = new ISO3166Country('TG', 'Togo', null, 228);

        $this->assertTrue(array_key_exists('name', $country->toArray()));
        $this->assertEquals('Togo', $country->toArray()['name']);
        
        $this->assertTrue(array_key_exists('label2', $country->toArray()));
        $this->assertEquals('TG', $country->toArray()['label2']);
        
        $this->assertTrue(array_key_exists('label', $country->toArray()));
        $this->assertEquals(null, $country->toArray()['label']);
        
        $this->assertTrue(array_key_exists('numeric', $country->toArray()));
        $this->assertEquals(228, $country->toArray()['numeric']);

    }

}