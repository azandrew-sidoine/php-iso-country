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

class ISO3166CountryFactory implements CountryFactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     */
    public function createCountry(array $attributes)
    {
        if (!isset($attributes['label2']) || !isset($attributes['name'])) {
            // TODO : Throw invalidata exception
            throw new \InvalidArgumentException('Execpt argument to be an array with required attributes');
        }

        return new ISO3166Country((string) $attributes['label2'], (string) $attributes['name'], isset($attributes['label']) ? (string) ($attributes['label']) : null, isset($attributes['numeric']) ? (int) ($attributes['numeric']) : null);
    }
}
