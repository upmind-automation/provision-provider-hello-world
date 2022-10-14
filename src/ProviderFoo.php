<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld;

use Upmind\ProvisionBase\Provider\Contract\ProviderInterface;
use Upmind\ProvisionBase\Provider\DataSet\AboutData;
use Upmind\ProvisionExample\Category\HelloWorld\Data\FooConfiguration;
use Upmind\ProvisionExample\Category\HelloWorld\Data\PersonData;
use Upmind\ProvisionExample\Category\HelloWorld\Data\Greeting;

/**
 * This HelloWorld Provider 'Foo' provides its own implementation of the
 * 'greeting' provision function.
 */
class ProviderFoo extends HelloWorldCategory implements ProviderInterface
{
    /**
     * @var FooConfiguration
     */
    protected $configuration;

    /**
     * Providers always receive their configuration passed to their constructor.
     *
     * @param array $configuration
     */
    public function __construct(FooConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public static function aboutProvider(): AboutData
    {
        return AboutData::create()
            ->setName('Hello Foo')
            ->setDescription('A demonstration of a provision function success case');
    }

    public function greeting(PersonData $person): Greeting
    {
        $apiKey = $this->configuration->api_key;
        $apiSecret = $this->configuration->api_secret;

        // $this->authenticateWithSomeApi($api_key, $api_secret);
        // do something with configuration data

        return Greeting::create()
            ->setSentence(sprintf('Hello %s! From your friend, Foo.', $person->name));
    }
}
