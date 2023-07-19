<?php

namespace Maris\Symfony\Address\Traits;

trait FiasTrait
{
    protected ?string $fias = null;

    /**
     * @return string|null
     */
    public function getFias(): ?string
    {
        return $this->fias;
    }

    /**
     * @param string|null $fias
     * @return $this
     */
    public function setFias(?string $fias): self
    {
        $this->fias = $fias;
        return $this;
    }

}