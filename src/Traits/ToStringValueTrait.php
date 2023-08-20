<?php

namespace Maris\Symfony\Address\Traits;

use Stringable;

/**
 * Трейт для объектов которые при
 * привидении к строке используют собственное значение.
 * @implements Stringable
 */
trait ToStringValueTrait
{
    use ValueTrait;

    public function __toString(): string
    {
        return $this->getValue() ?? "";
    }

}