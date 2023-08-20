<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт для объектов способных хранить ОКАТО.
 */
trait OkatoTrait
{
    protected ?string $okato = null;

    /**
     * @return string|null
     */
    public function getOkato(): ?string
    {
        return $this->okato;
    }

    /**
     * @param string|null $okato
     * @return $this
     */
    public function setOkato(?string $okato): self
    {
        $this->okato = $okato;
        return $this;
    }


}