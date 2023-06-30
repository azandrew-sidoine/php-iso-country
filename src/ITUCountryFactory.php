<?php

namespace Drewlabs\ISO\Country;

use InvalidArgumentException;

class ITUCountryFactory implements CountryFactoryInterface
{
    /**
     * {@inheritDoc}
     * 
     * @throws InvalidArgumentException
     */
    public function createCountry(array $attributes)
    {
        if (!isset($attributes['code']) || !isset($attributes['alpha2'])) {
            // TODO : Throw invalidata exception
            throw new InvalidArgumentException('Execpt argument to be an array with required attributes');
        }
        return new ITUCountry($attributes['alpha2'], $attributes['code'], $attributes['name'] ?? null);
    }
}
