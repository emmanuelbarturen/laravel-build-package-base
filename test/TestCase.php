<?php namespace VendorName\PackageName\Test;

use VendorName\PackageName\PackageName;
use VendorName\PackageName\PackageNameServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

/**
 * Class TestCase
 * @package lasselehtinen\MyPackage\Test
 */
class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [PackageNameServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'PackageName' => PackageName::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('variable.name', 'value');
        $app['config']->set('anotherVariable.name', 'anotherValue');
    }
}
