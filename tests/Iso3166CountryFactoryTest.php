<?php

use Drewlabs\ISO\Country\ISO3166Country;
use Drewlabs\ISO\Country\ISO3166CountryFactory;
use PHPUnit\Framework\TestCase;

class Iso3166CountryFactoryTest extends TestCase
{

    public function test_iso_3166_factory_create_country()
    {
        $factory = new ISO3166CountryFactory;

        // Act
        $country = $factory->createCountry([
            'name' => 'Togo',
            'label2' => 'TG',
        ]);

        // Assert
        $this->assertInstanceOf(ISO3166Country::class, $country);
        $this->assertEquals('TG', $country->getAlpha2());
        $this->assertEquals('Togo', $country->getName());
    }
    public function test_iso_3166_factory_create_country_throws_runtime_exception()
    {
        $factory = new ISO3166CountryFactory;

        // Assert
        $this->expectException(InvalidArgumentException::class);
        
        // Act
        $factory->createCountry([
            'name' => 'Togo'
        ]);
    }
}