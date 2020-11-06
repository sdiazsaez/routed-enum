<?php

namespace Larangular\RoutedEnum\Enum;

abstract class BasicEnum {

    private function __construct() {
    }

    public static function isValidName(string $name, bool $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys, false);
    }

    public static function isValidValue($value): bool {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict = true);
    }

    public static function getConstants(): array {
        return app('routed-enum-helper')->getConstants(static::class);
    }

    public static function getLabel($index): ?string {
        $m = 'getLabels';
        $labels = (method_exists(static::class, $m))
            ? call_user_func(static::class . '::' . $m)
            : [];
        return @$labels[$index];
    }
}
