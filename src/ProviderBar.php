<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld;

use Upmind\ProvisionBase\Provider\Contract\ProviderInterface;
use Upmind\ProvisionBase\Provider\DataSet\AboutData;
use Upmind\ProvisionExample\Category\HelloWorld\Data\BarConfiguration;
use Upmind\ProvisionExample\Category\HelloWorld\Data\PersonData;
use Upmind\ProvisionExample\Category\HelloWorld\Data\Greeting;

/**
 * This HelloWorld Provider 'Bar' provides its own implementation of the
 * 'greeting' function.
 *
 * In this implementation, an exception is encountered, and caught by returning
 * a formatted error response with a user-friendly message.
 */
class ProviderBar extends HelloWorldCategory implements ProviderInterface
{
    /**
     * @var BarConfiguration
     */
    protected $configuration;

    public function __construct(BarConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public static function aboutProvider(): AboutData
    {
        return AboutData::create()
            ->setName('Hello Bar')
            ->setDescription('A demonstration of a provision function error case');
    }

    public function greeting(PersonData $person): Greeting
    {
        $endpointUrl = $this->configuration->endpoint_url;
        $username = $this->configuration->username;
        $password = $this->configuration->password;

        try {
            // $data $this->getSomeData($endpoint_url, $username, $password);
            // do something via an api

            throw new \RuntimeException('Example error from an API');

            return Greeting::create()
                ->setSentence(sprintf('What\'s up %s! From your friend, Bar.', $person->name));
        } catch (\Throwable $e) {
            $message = 'Example user-friendly error message';
            $data = [
                'meta' => 'Some user-friendly contextual data'
            ];
            $debug = [
                'endpoint_url' => $endpointUrl,
                'username' => $username,
            ];

            // throws a ProvisionFunctionError to signify execution failure and return some error data
            $this->errorResult($message, $data, $debug, $e);
        }
    }
}
