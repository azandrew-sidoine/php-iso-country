<?php

use Drewlabs\ISO\Country\CountryInterface;
use Drewlabs\ISO\Country\ITU;
use PHPUnit\Framework\TestCase;

class ITUTest extends TestCase
{
    public function test_itu_collection()
    {
        $collection = ITU::collection();

        // Assert
        $this->assertInstanceOf(CountryInterface::class, $collection->first());

        // Act
        $first = $collection->first(function(CountryInterface $country) {
            return strtolower((string)$country) === 'tg';
        });
        
        // Assert
        $this->assertEquals('TG', $first->getAlpha2());
    }

}