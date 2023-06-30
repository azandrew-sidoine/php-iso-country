<?php

namespace Drewlabs\ISO\Country;

use InvalidArgumentException;

class ISO3166CountryFactory implements CountryFactoryInterface
{
    /**
     * {@inheritDoc}
     * 
     * @throws InvalidArgumentException
     */
    public function createCountry(array $attributes)
    {
        if (!isset($attributes['label2']) || !isset($attributes['name'])) {
            // TODO : Throw invalidata exception
            throw new InvalidArgumentException('Execpt argument to be an array with required attributes');
        }
        return new ISO3166Country(strval($attributes['label2']), strval($attributes['name']), isset($attributes['label']) ? strval($attributes['label']) : null, isset($attributes['numeric']) ? intval($attributes['numeric']) : null);
    }
}