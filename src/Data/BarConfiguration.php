<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld\Data;

use Upmind\ProvisionBase\Provider\DataSet\DataSet;
use Upmind\ProvisionBase\Provider\DataSet\Rules;

/**
 * Example of a configuration data set for the Bar provider.
 *
 * @property-read string $endpoint_url Imaginary endpoint url
 * @property-read string $username Imaginary username
 * @property-read string $password Imaginary password
 */
class BarConfiguration extends DataSet
{
    public static function rules(): Rules
    {
        return new Rules([
            'endpoint_url' => ['required', 'string', 'url'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }
}
