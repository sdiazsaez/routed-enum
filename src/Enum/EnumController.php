<?php

namespace Larangular\RoutedEnum\Enum;

use Illuminate\Database\Eloquent\Collection;
use Larangular\RoutedEnum\Models\Enum;
use Larangular\RoutingController\{Contracts\IGatewayModel, Controller, MakeResponse};

abstract class EnumController extends Controller implements IGatewayModel {
    use MakeResponse;

    abstract public function enumValues(): array;

    abstract public function onCreateEnum($enumKey, $key, $value): Enum;

    public function model() {
        // TODO: Implement model() method.
    }

    public function allowedMethods(): array {
        return [
            //'index',
            'show',
        ];
    }

    public function entries($where = []) {
        $where['type'] = empty($where)
            ? array_keys($this->enumValues())
            : [$where['type']];

        $response = [];
        foreach ($where['type'] as $type) {
            $response[] = $this->createEnum($type);
        }

        return $this->makeResponse(new Collection($response));
    }

    public function entry($id) {
        $response = $this->createEnum($id);
        return $this->makeResponse($response);
    }

    protected function getEnumClass(string $enumKey): string {
        $values = $this->enumValues();
        return $values[$enumKey];
    }

    protected function getLabel(string $enumKey, $key): ?string {
        $labels = [];
        try {
            $e = $this->getEnumClass($enumKey);
            if(method_exists($e, 'getLabels')) {
                $labels = \call_user_func($e . '::getLabels');
            }
        } catch (\Exception $e) {
        }

        return empty($labels)
            ? $key
            : @$labels[$key];
    }

    private function createEnum(string $enumKey): Collection {
        $constants = app('routed-enum-helper')->getConstants($this->getEnumClass($enumKey));
        $values = [];
        foreach ($constants as $key => $value) {
            $values[] = $this->onCreateEnum($enumKey, $key, $value);
        }

        return new Collection($values);
    }

}
