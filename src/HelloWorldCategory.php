<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld;

use Upmind\ProvisionBase\Provider\BaseCategory;
use Upmind\ProvisionBase\Provider\DataSet\AboutData;
use Upmind\ProvisionExample\Category\HelloWorld\Data\Greeting;
use Upmind\ProvisionExample\Category\HelloWorld\Data\PersonData;

/**
 * A simple category for 'Hello World' provider implementations. All Providers
 * of this Category must implement the 'greeting' function, using the single
 * parameter 'name'.
 */
abstract class HelloWorldCategory extends BaseCategory
{
    public static function aboutCategory(): AboutData
    {
        return AboutData::create()
            ->setName('Hello World')
            ->setDescription('A demonstration category that doesn\'t actually do anything')
            ->setIcon('thumbs up');
    }

    /**
     * Greet the user by name.
     */
    abstract public function greeting(PersonData $person): Greeting;
}
