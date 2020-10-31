<?php

Route::group([
    'prefix'     => config('routed-enum.route-prefix'),
    'middleware' => 'api',
    'namespace'  => 'Larangular\RoutedEnum\Http\Controllers',
    'as'         => 'larangular.api.routed-enum.',
], static function () {
    Route::resource('/', 'Gateway');
});
