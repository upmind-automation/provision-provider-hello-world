<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld\Data;

use Upmind\ProvisionBase\Provider\DataSet\DataSet;
use Upmind\ProvisionBase\Provider\DataSet\Rules;

/**
 * Example of a configuration data set for the Foo provider.
 *
 * @property-read string $api_key Imaginary API key
 * @property-read string $api_secret Imaginary API secret
 */
class FooConfiguration extends DataSet
{
    public static function rules(): Rules
    {
        return new Rules([
            'api_key' => ['required', 'string'],
            'api_secret' => ['required', 'string'],
        ]);
    }
}
