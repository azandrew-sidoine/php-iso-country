<?php

namespace Drewlabs\ISO\Country;

use JsonSerializable;

class ITUCountry implements CountryInterface, JsonSerializable
{
    /**
     * @var string
     */
    private $alpha2;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;


    /**
     * creates class instance
     * 
     * @param string $alpha2 
     * @param string $code 
     * @param mixed $name 
     * @return void 
     */
    public function __construct(string $alpha2, string $code, $name = null)
    {
        $this->alpha2 = $alpha2;
        $this->code = $code;
        $this->name = $name;
        
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
     * returns the `name` iso code for the country
     * 
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * returns the `ITU-T code` for the current instance
     * 
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
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
            'alpha2' => $this->getAlpha2(),
            'code' => $this->getCode()
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