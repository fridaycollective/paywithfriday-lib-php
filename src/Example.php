<?php

/**
 * This file is part of fridaycollective/paywithfriday-lib
 *
 * @copyright Copyright (c) Friday Collective <hey@fridaycollective.co.uk>. All rights reserved.
 */

declare(strict_types=1);

namespace Fridaycollective\Paywithfriday\Lib;

/**
 * An example class to act as a starting point for developing your library
 */
class Example
{
    /**
     * Returns a greeting statement using the provided name
     */
    public function greet(string $name = 'World'): string
    {
        return "Hello, {$name}!";
    }
}
