<?php

namespace Larangular\RoutedEnum\tests;

use Larangular\RoutedEnum\RoutedEnumServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase {

    protected function setUp(): void {
        parent::setUp();

        //$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //$this->artisan('migrate', ['--database' => 'package_test'])->run();
        //$this->loadLaravelMigrations(['--database' => 'package_test']);
        // and other test setup steps you need to perform
    }

    protected function getEnvironmentSetUp($app): void {
        $app['config']->set('routed-enum', require(__DIR__ . '/../config/routed-enum.php'));
        $app['config']->set('routed-enum.enums', [
            'sample-enum' => SampleEnum::class,
        ]);
    }

    protected function getPackageProviders($app): array {
        return [
            RoutedEnumServiceProvider::class,
        ];
    }

}
