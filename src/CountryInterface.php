<?php

namespace Drewlabs\ISO\Country;

interface CountryInterface
{
    /**
     * returns the `alpha 2` iso code for the country
     * 
     * @return string 
     */
    public function getAlpha2();

    /**
     * returns the `name` iso code for the country
     * 
     * @return string 
     */
    public function getName();

    /**
     * returns a string value of the country
     * 
     * @return string 
     */
    public function __toString();

}