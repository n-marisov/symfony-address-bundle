<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт содержит полное название типа.
 */
trait FullTypeTrait
{
    /**
     * Полное название типа компонента.
     * @var string|null
     */
    protected ?string $fullType = null;

    /**
     * @return string|null
     */
    public function getFullType(): ?string
    {
        return $this->fullType;
    }

    /**
     * @param string|null $fullType
     * @return $this
     */
    public function setFullType(?string $fullType): self
    {
        $this->fullType = $fullType;
        return $this;
    }


}