<?php

use Drewlabs\ISO\Country\Collection;
use Drewlabs\ISO\Country\CountryInterface;
use Drewlabs\ISO\Country\ITUCountry;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    public static function provideCollection()
    {
        return [
            [new Collection([
                new ITUCountry('TG', '228', 'TOGO'),
                new ITUCountry('GH', '233', 'Ghana'),
                new ITUCountry('BJ', '229', 'Benin'),
            ])]
        ];
    }

    /**
     * @dataProvider provideCollection
     * 
     * @param Collection $collection 
     * @return void 
     */
    public function test_collection_get_by_iso_code($collection)
    {
        // Assert
        $this->assertNull($collection->get('FR'));
        $this->assertEquals('TG', $collection->get('TG')->getAlpha2());
        $this->assertEquals('Ghana', $collection->get('GH')->getName());
    }

    /**
     * 
     * @dataProvider provideCollection
     * @param mixed $collection 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function test_collection_all($collection)
    {
        $this->assertTrue(is_array($collection->all()));
    }

    /**
     * 
     * @dataProvider provideCollection
     * @param Collection $collection 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function test_collection_filter($collection)
    {
        $collection2 = $collection->filter(function(CountryInterface $country) {
            return $country->getAlpha2() !== 'TG';
        });

        $this->assertNotNull($collection->get('TG'));
        $this->assertNull($collection2->get('TG'));
        $this->assertEquals('Ghana', $collection2->get('GH')->getName());
    }


    /**
     * 
     * @dataProvider provideCollection
     * @param Collection $collection 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function test_collection_map($collection)
    {
        $mapResult = $collection->filter(function(CountryInterface $country) {
            return $country->getAlpha2() === 'TG';
        })->map(function(CountryInterface $country) {
            return $country->getAlpha2();
        });
        $this->assertTrue($mapResult->first()  === 'TG');
    }
}
