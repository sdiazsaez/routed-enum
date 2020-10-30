<?php

namespace Larangular\RoutedEnum\tests;

use Larangular\RoutedEnum\Contracts\EnumHasLabels;
use Larangular\RoutedEnum\Enum\BasicEnum;

class SampleEnum extends BasicEnum implements EnumHasLabels {
    public const SAMPLE  = 0;
    public const ENUM    = 1;
    public const WITH    = 2;
    public const NUMBERS = 3;

    public static function getLabels(): array {
        return [
            'Muestra',
            'Enumerador',
            'Con',
            'Numeros',
        ];
    }
}
