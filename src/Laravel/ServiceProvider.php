<?php

declare(strict_types=1);

namespace Upmind\ProvisionExample\Category\HelloWorld\Laravel;

use Upmind\ProvisionBase\Laravel\ProvisionServiceProvider;
use Upmind\ProvisionExample\Category\HelloWorld\HelloWorldCategory;
use Upmind\ProvisionExample\Category\HelloWorld\ProviderFoo;
use Upmind\ProvisionExample\Category\HelloWorld\ProviderBar;

class ServiceProvider extends ProvisionServiceProvider
{
    /**
     * Bind the HelloWorld Category and its Providers.
     */
    public function boot()
    {
        $this->bindCategory('hello-world', HelloWorldCategory::class);

        $this->bindProvider('hello-world', 'foo', ProviderFoo::class);
        $this->bindProvider('hello-world', 'bar', ProviderBar::class);
    }
}
