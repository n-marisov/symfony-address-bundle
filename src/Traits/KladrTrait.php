<?php

namespace Maris\Symfony\Address\Traits;

trait KladrTrait
{
    protected ?string $kladr = null;

    /**
     * @return string|null
     */
    public function getKladr(): ?string
    {
        return $this->kladr;
    }

    /**
     * @param string|null $kladr
     * @return $this
     */
    public function setKladr(?string $kladr): self
    {
        $this->kladr = $kladr;
        return $this;
    }

}