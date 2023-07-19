<?php

namespace Maris\Symfony\Address\Entity;

class Country extends Component
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