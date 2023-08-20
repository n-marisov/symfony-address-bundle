<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт содержит строку значения.
 */
trait ValueTrait
{
    protected ?string $value = null;

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;
        return $this;
    }


}