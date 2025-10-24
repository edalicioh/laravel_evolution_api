<?php

namespace Edalicio\EvolutionApi\Tests;

use Edalicio\EvolutionApi\EvolutionApiServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [
            EvolutionApiServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Configuração para testes
        $app['config']->set('evolution-api.base_url', 'https://evolution-api.test');
        $app['config']->set('evolution-api.global_api_key', 'test-api-key');
    }
}
