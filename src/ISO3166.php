<?php

namespace Drewlabs\ISO\Country;

class ISO3166
{
    /**
     * creates a collection instance from iso 3166 country data
     * 
     * @return Collection 
     * @throws RuntimeException 
     */
    public static function collection()
    {
        $jsoLoader = new JsonLoader(new ISO3166CountryFactory);
        return new Collection($jsoLoader->load(__DIR__ . '/../data/iso3166.json'));
    }
}