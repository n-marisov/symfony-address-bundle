<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт для почтовой информации.
 */
trait PostalTrait
{
    /***
     * Почтовый индекс.
     * Хранится как строка потому что,
     * существуют индексы которые, начинаются с 0.
     * @var string|null
     */
    protected ?string $postalIndex = null;

    /**
     * Почтовый ящик.
     * @var string|null
     */
    protected ?string $postalBox = null;

    /**
     * @return string|null
     */
    public function getPostalIndex(): ?string
    {
        return $this->postalIndex;
    }

    /**
     * @param string|null $postalIndex
     * @return $this
     */
    public function setPostalIndex(?string $postalIndex): self
    {
        $this->postalIndex = $postalIndex;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalBox(): ?string
    {
        return $this->postalBox;
    }

    /**
     * @param string|null $postalBox
     * @return $this
     */
    public function setPostalBox(?string $postalBox): self
    {
        $this->postalBox = $postalBox;
        return $this;
    }



}