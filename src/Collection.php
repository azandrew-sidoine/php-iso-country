<?php

namespace Drewlabs\ISO\Country;

class Collection implements CountryCollectionInterface
{
    /**
     * @var array|\Traversable
     */
    private $values;

    /**
     * Creates collection instance
     * 
     * @param array|\Traversable $values 
     */
    public function __construct(array $values)
    {
        $this->values =  $values ?? [];
    }

    public function get(string $isoCode)
    {
        return $this->first(function ($country) use ($isoCode) {
            return (string)($country->getAlpha2()) === strval($isoCode);
        });
    }

    public function all()
    {
        return is_array($this->values) ? $this->values : iterator_to_array($this->values);
    }

    public function filter(callable $predicate)
    {
        $collection = [];
        foreach ($this->values as $value) {
            $result = call_user_func($predicate, $value);
            if (true === boolval($result)) {
                $collection[] = $value;
            }
        }
        return new static($collection);
    }

    public function map(callable $callback)
    {        
        $collection = [];
        foreach ($this->values as $value) {
            $collection[] = call_user_func($callback, $value);
        }
        return new static($collection);
    }

    public function first(?callable $predicate = null)
    {
        // Case the predicate is null, simply return the first item
        if (null === $predicate) {
            foreach ($this->values as $value) {
                return $value;
            }
        }

        //
        $result = null;
        foreach ($this->values as $value) {
            if (boolval($predicate($value))) {
                $result = $value;
                break;
            }
        }
        return $result;
    }
}
