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

class ITUCountryFactory implements CountryFactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     */
    public function createCountry(array $attributes)
    {
        if (!isset($attributes['code']) || !isset($attributes['alpha2'])) {
            // TODO : Throw invalidata exception
            throw new \InvalidArgumentException('Execpt argument to be an array with required attributes');
        }

        return new ITUCountry($attributes['alpha2'], $attributes['code'], $attributes['name'] ?? null);
    }
}
