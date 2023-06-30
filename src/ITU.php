<?php

namespace Drewlabs\ISO\Country;

class ITU
{
    /**
     * creates a collection instance from ITU-T country data
     * 
     * @return Collection
     * 
     * @throws RuntimeException 
     */
    public static function collection()
    {
        $jsoLoader = new JsonLoader(new ITUCountryFactory);
        return new Collection($jsoLoader->load(__DIR__ . '/../data/itu.json'));
    }

}