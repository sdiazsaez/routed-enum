<?php

namespace Larangular\RoutedEnum\Facades;

use Illuminate\Support\Facades\Facade;

class EnumHelper extends Facade {
    protected static function getFacadeAccessor(): string {
        return 'routed-enum-helper';
    }
}
