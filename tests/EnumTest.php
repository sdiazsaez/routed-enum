<?php

namespace Larangular\RoutedEnum\tests;

use Larangular\RoutedEnum\Http\Controllers\Gateway;

class EnumTest extends TestCase {

    private $gateway;

    public function setUp(): void {
        parent::setUp();
        $this->gateway = new Gateway();
    }

    public function testGetLabel() {
        self::assertEquals('Muestra', SampleEnum::getLabel(SampleEnum::SAMPLE));
        self::assertEquals('Enumerador', SampleEnum::getLabel(SampleEnum::ENUM));
        self::assertEquals('Con', SampleEnum::getLabel(SampleEnum::WITH));
        self::assertEquals('Numeros', SampleEnum::getLabel(SampleEnum::NUMBERS));
    }

    public function testGatewayRequest() {
        $e = $this->gateway->entries();
        self::assertEquals([
            [
                [
                    'key'   => 'SAMPLE',
                    'value' => 0,
                    'label' => 'Muestra',
                ],
                [
                    'key'   => 'ENUM',
                    'value' => 1,
                    'label' => 'Enumerador',
                ],
                [
                    'key'   => 'WITH',
                    'value' => 2,
                    'label' => 'Con',
                ],
                [
                    'key'   => 'NUMBERS',
                    'value' => 3,
                    'label' => 'Numeros',
                ],
            ],
        ], $e->toArray());
    }

}
