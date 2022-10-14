<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld\Data;

use Upmind\ProvisionBase\Provider\DataSet\ResultData;
use Upmind\ProvisionBase\Provider\DataSet\Rules;

/**
 * Data set encapsulating a greeting.
 *
 * @property-read string $sentence Greeting sentence
 */
class Greeting extends ResultData
{
    public static function rules(): Rules
    {
        return new Rules([
            'sentence' => ['required', 'string'],
        ]);
    }

    public function setSentence(string $sentence): self
    {
        $this->setValue('sentence', $sentence);
        return $this;
    }
}
