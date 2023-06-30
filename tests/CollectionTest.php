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
            ])],
        ];
    }

    /**
     * @dataProvider provideCollection
     *
     * @param Collection $collection
     *
     * @return void
     */
    public function test_collection_get_by_iso_code($collection)
    {
        // Assert
        $this->assertNull($collection->get('FR'));
        $this->assertSame('TG', $collection->get('TG')->getAlpha2());
        $this->assertSame('Ghana', $collection->get('GH')->getName());
    }

    /**
     * @dataProvider provideCollection
     *
     * @param mixed $collection
     *
     * @throws ExpectationFailedException
     *
     * @return void
     */
    public function test_collection_all($collection)
    {
        $this->assertInternalType('array', $collection->all());
    }

    /**
     * @dataProvider provideCollection
     *
     * @param Collection $collection
     *
     * @throws ExpectationFailedException
     *
     * @return void
     */
    public function test_collection_filter($collection)
    {
        $collection2 = $collection->filter(static function (CountryInterface $country) {
            return 'TG' !== $country->getAlpha2();
        });

        $this->assertNotNull($collection->get('TG'));
        $this->assertNull($collection2->get('TG'));
        $this->assertSame('Ghana', $collection2->get('GH')->getName());
    }

    /**
     * @dataProvider provideCollection
     *
     * @param Collection $collection
     *
     * @throws ExpectationFailedException
     *
     * @return void
     */
    public function test_collection_map($collection)
    {
        $mapResult = $collection->filter(static function (CountryInterface $country) {
            return 'TG' === $country->getAlpha2();
        })->map(static function (CountryInterface $country) {
            return $country->getAlpha2();
        });
        $this->assertTrue('TG' === $mapResult->first());
    }
}
