<?php

namespace Drewlabs\ISO\Country;

interface CountryFactoryInterface
{
    /**
     * creates a country instance from the attributes
     * 
     * @param array $attributes
     *  
     * @return CountryInterface 
     */
    public function createCountry(array $attributes);

}