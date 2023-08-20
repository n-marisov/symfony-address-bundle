<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт для объектов которые
 * используют при привидении к строке
 * значение с типом.
 */
trait ToStringValueWithTypeTrait
{
    use ValueWithTypeTrait;

    public function __toString(): string
    {
        return $this->getValueWithType() ?? "";
    }
}