<?php

namespace Drewlabs\ISO\Country;

use RuntimeException;

class JsonLoader
{
    /**
     * @var CountryFactoryInterface
     */
    private $factory;

    /**
     * Creates class instance
     * 
     * @param CountryFactoryInterface $factory 
     * @return void 
     */
    public function __construct(CountryFactoryInterface $factory)
    {
        $this->factory = $factory;
    }


    /**
     * Load countries data from a specific path
     * 
     * @param string $path 
     * @return CountryInterface[] 
     * @throws RuntimeException 
     */
    public function load(string $path)
    {
        if (!is_file($path)) {
            throw new RuntimeException('json file not found at location');
        }

        if (false === ($content = file_get_contents($path))) {
            return [];
        }

        $values = [];

        if (false === boolval($array = @json_decode($content, true))) {
            return $values;
        }
    
        foreach ($array as $value) {
            $values[] = $this->factory->createCountry($value);
        }

        return $values;
    }
}