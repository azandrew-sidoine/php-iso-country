<?php

declare(strict_types=1);

/*
 * This file is part of the drewlabs namespace.
 *
 * (c) Sidoine Azandrew <azandrewdevelopper@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drewlabs\ISO\Country;

class ITUCountry implements CountryInterface, \JsonSerializable
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
     * creates class instance.
     *
     * @param mixed $name
     *
     * @return void
     */
    public function __construct(string $alpha2, string $code, $name = null)
    {
        $this->alpha2 = $alpha2;
        $this->code = $code;
        $this->name = $name;

    }

    public function __toString()
    {
        return (string) $this->getAlpha2();
    }

    /**
     * returns the `alpha 2` iso code for the country.
     *
     * @return string
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * returns the `name` iso code for the country.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * returns the `ITU-T code` for the current instance.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * returns the array representation of the instance.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'alpha2' => $this->getAlpha2(),
            'code' => $this->getCode(),
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
