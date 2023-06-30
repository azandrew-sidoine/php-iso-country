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

namespace Drewlabs\ISO\Country;

interface CountryCollectionInterface
{
    /**
     * get a country using it iso code.
     *
     * @return CountryInterface|mixed|null
     */
    public function get(string $isoCode);

    /**
     * @return CountryInterface[]|\Traversable<CountryInterface>
     */
    public function all();

    /**
     * filter collection using a predicate function.
     *
     * @param callable|\Closure(CountryInterface $country): (bool) $predicate
     *
     * @return static
     */
    public function filter(callable $predicate);

    /**
     * project collection values to an output value.
     *
     * @param callable|\Closure(CountryInterface $country): (mixed) $callback
     *
     * @return static
     */
    public function map(callable $callback);

    /**
     * get the first item from the collection. If a predicate is passed as parameter,
     * the predicate is invoke with each country and must return true
     * for country matching the predicate condition.
     *
     * @param callable|\Closure(CountryInterface $country): (bool) $predicate|null $predicate
     *
     * @return CountryInterface|mixed
     */
    public function first(callable $predicate = null);
}
