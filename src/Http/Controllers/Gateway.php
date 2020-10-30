<?php

namespace Larangular\RoutedEnum\Http\Controllers;

use Larangular\RoutedEnum\Enum\EnumController;
use Larangular\RoutedEnum\Enum\EnumModel;
use Larangular\RoutedEnum\Models\Enum;

class Gateway extends EnumController {

    public function enumValues(): array {
        return config('routed-enum.enums');
    }

    public function onCreateEnum($enumKey, $key, $value): Enum {
        return (new Enum())->fill([
            'key'   => $key,
            'value' => $value,
            'label' => $this->getLabel($enumKey, $value),
        ]);
    }

}
