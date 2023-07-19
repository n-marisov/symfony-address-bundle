<?php

namespace Maris\Symfony\Address\Traits;

trait IsoTrait
{
    protected ?string $iso = null;

    /**
     * @return string|null
     */
    public function getIso(): ?string
    {
        return $this->iso;
    }

    /**
     * @param string|null $iso
     * @return $this
     */
    public function setIso(?string $iso): self
    {
        $this->iso = $iso;
        return $this;
    }

}