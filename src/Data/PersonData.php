<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld\Data;

use Upmind\ProvisionBase\Provider\DataSet\DataSet;
use Upmind\ProvisionBase\Provider\DataSet\Rules;

/**
 * Data set encapsulating a person.
 *
 * @property-read string $name Name of the person
 */
class PersonData extends DataSet
{
    public static function rules(): Rules
    {
        return new Rules([
            'name' => ['required', 'string'],
        ]);
    }
}
