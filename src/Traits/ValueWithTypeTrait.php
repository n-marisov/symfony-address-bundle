<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт содержит название с типом
 */
trait ValueWithTypeTrait
{
    /***
     * @var string|null
     */
    protected ?string $valueWithType = null;

    /**
     * @return string|null
     */
    public function getValueWithType(): ?string
    {
        return $this->valueWithType;
    }

    /**
     * @param string|null $valueWithType
     * @return $this
     */
    public function setValueWithType(?string $valueWithType): self
    {
        $this->valueWithType = $valueWithType;
        return $this;
    }


}