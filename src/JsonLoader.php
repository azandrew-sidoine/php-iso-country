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

class JsonLoader
{
    /**
     * @var CountryFactoryInterface
     */
    private $factory;

    /**
     * Creates class instance.
     *
     * @return void
     */
    public function __construct(CountryFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Load countries data from a specific path.
     *
     * @throws \RuntimeException
     *
     * @return CountryInterface[]
     */
    public function load(string $path)
    {
        if (!is_file($path)) {
            throw new \RuntimeException('json file not found at location');
        }

        if (false === ($content = file_get_contents($path))) {
            return [];
        }

        $values = [];

        if (false === (bool) ($array = @json_decode($content, true))) {
            return $values;
        }

        foreach ($array as $value) {
            $values[] = $this->factory->createCountry($value);
        }

        return $values;
    }
}
