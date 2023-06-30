<?php

namespace Drewlabs\ISO\Country;

use JsonSerializable;

final class ISO3166Country implements CountryInterface, JsonSerializable
{
    /**
     * @var string
     */
    private $alpha2;

    /**
     * @var string|null
     */
    private $alpha3;

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $numeric;

    /**
     * creates class instance
     * 
     * @param string $alpha2 
     * @param string $name 
     * @param string|null $alpha3 
     * @param mixed $numeric 
     * @return void 
     */
    public function __construct(string $alpha2, string $name, string $alpha3 = null, $numeric = null)
    {
        $this->alpha2 = $alpha2;
        $this->name = $name;
        $this->alpha3 = $alpha3;
        $this->numeric = $numeric;
    }

    /**
     * returns the `alpha 2` iso code for the country
     * 
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * returns the `alpha 3` iso code value for the country
     * 
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }


    /**
     * returns the `name` iso code for the country
     * 
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * returns the numeric representation of the country in the iso3166 table
     * 
     * @return mixed 
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * returns the array representation of the instance
     * 
     * @return array 
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'label' => $this->getAlpha3(),
            'label2' => $this->getAlpha2(),
            'numeric' => $this->getNumeric()
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function __toString()
    {
        return strval($this->getAlpha2());
    }
}
