<?php

namespace Larangular\RoutedEnum\Enum;

class EnumHelper {

    private $constCacheArray = null;

    public function getConstantName($className, $constantValue) {
        $constants = $this->getConstants($className);
        return array_search($constantValue, $constants, true);
    }

    public function getConstant($className, $name) {
        $constants = $this->getConstants($className);
        return @$constants[$name] ?? null;
    }

    public function getConstants(string $calledClass): array {
        if ($this->constCacheArray === null) {
            $this->constCacheArray = [];
        }

        if (!array_key_exists($calledClass, $this->constCacheArray)) {
            try {
                $reflect = new \ReflectionClass($calledClass);
                $this->constCacheArray[$calledClass] = $reflect->getConstants();
            } catch (\ReflectionException $e) {
            }
        }
        return @$this->constCacheArray[$calledClass];
    }

}
