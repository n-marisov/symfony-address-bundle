<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт для объектов которые хранят код ОКТМО.
 */
trait OktmoTrait
{
    protected ?string $oktmo = null;

    /**
     * @return string|null
     */
    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    /**
     * @param string|null $oktmo
     * @return $this
     */
    public function setOktmo(?string $oktmo): self
    {
        $this->oktmo = $oktmo;
        return $this;
    }


}