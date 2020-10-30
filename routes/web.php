<?php

Route::group([
    'prefix'     => config('routed-enum.route-prefix'),
    'middleware' => 'api',
    'namespace'  => 'Larangular\Enum',
    'as'         => 'larangular.api.routed-enum.',
], static function () {
    Route::get('{enum}', 'Quote\Gateway@quotePaymentDetails');
});
