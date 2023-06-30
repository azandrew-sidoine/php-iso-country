<?php

use Drewlabs\ISO\Country\ITUCountry;
use Drewlabs\ISO\Country\ITUCountryFactory;
use PHPUnit\Framework\TestCase;

class ITUCountryFactoryTest extends TestCase
{

    public function test_itu_factory_create_country()
    {
        $factory = new ITUCountryFactory;

        // Act
        $country = $factory->createCountry([
            'name' => 'Togo',
            'alpha2' => 'TG',
            'code' => '228'
        ]);

        // Assert
        $this->assertInstanceOf(ITUCountry::class, $country);
        $this->assertEquals('TG', $country->getAlpha2());
        $this->assertEquals('Togo', $country->getName());
    }
    public function test_itu_factory_create_country_throws_runtime_exception()
    {
        $factory = new ITUCountryFactory;

        // Assert
        $this->expectException(InvalidArgumentException::class);
        
        // Act
        $factory->createCountry([
            'name' => 'Togo',
            'code' => '228'
        ]);
    }
}