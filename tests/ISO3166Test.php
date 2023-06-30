<?php

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
        $first = $collection->first(function(CountryInterface $country) {
            return strtolower((string)$country) === 'tg';
        });
        
        // Assert
        $this->assertEquals('TG', $first->getAlpha2());
    }
}
