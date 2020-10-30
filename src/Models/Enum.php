<?php

namespace Larangular\RoutedEnum\Models;

use Illuminate\Database\Eloquent\Model;

class Enum extends Model {

    protected $fillable = [
        'key',
        'value',
        'label',
    ];

}
