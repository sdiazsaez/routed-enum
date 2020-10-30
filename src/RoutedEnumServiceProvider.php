<?php

namespace Larangular\RoutedEnum;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Larangular\Installable\Support\PublishableGroups;
use Larangular\RoutedEnum\Enum\EnumHelper;
use Larangular\Support\SupportServiceProvider;

class RoutedEnumServiceProvider extends ServiceProvider implements DeferrableProvider {

    public function boot(): void {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->publishes([__DIR__ . '/../config/routed-enum.php' => config_path('routed-enum.php')],
            PublishableGroups::Config);
    }

    public function register(): void {
        $this->app->register(SupportServiceProvider::class);
        $this->mergeConfigFrom(__DIR__ . '/../config/routed-enum.php', 'routed-enum');

        $this->app->singleton('routed-enum-helper', static function () {
            return new EnumHelper();
        });
    }

    public function provides(): array {
        return [
            'routed-enum-helper',
            //'EnumHelper'
        ];
    }
}
