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

class Collection implements CountryCollectionInterface
{
    /**
     * @var array|\Traversable
     */
    private $values;

    /**
     * Creates collection instance.
     *
     * @param array|\Traversable $values
     */
    public function __construct(array $values)
    {
        $this->values = $values ?? [];
    }

    public function get(string $isoCode)
    {
        return $this->first(static function ($country) use ($isoCode) {
            return (string) $country->getAlpha2() === (string) $isoCode;
        });
    }

    public function all()
    {
        return \is_array($this->values) ? $this->values : iterator_to_array($this->values);
    }

    public function filter(callable $predicate)
    {
        $collection = [];
        foreach ($this->values as $value) {
            $result = \call_user_func($predicate, $value);
            if (true === (bool) $result) {
                $collection[] = $value;
            }
        }

        return new static($collection);
    }

    public function map(callable $callback)
    {
        $collection = [];
        foreach ($this->values as $value) {
            $collection[] = \call_user_func($callback, $value);
        }

        return new static($collection);
    }

    public function first(callable $predicate = null)
    {
        // Case the predicate is null, simply return the first item
        if (null === $predicate) {
            foreach ($this->values as $value) {
                return $value;
            }
        }

        $result = null;
        foreach ($this->values as $value) {
            if ((bool) $predicate($value)) {
                $result = $value;
                break;
            }
        }

        return $result;
    }
}
