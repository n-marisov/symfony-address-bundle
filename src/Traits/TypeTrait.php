<?php

namespace Maris\Symfony\Address\Traits;

/***
 * Трейт содержит сокращенный тип компонента.
 */
trait TypeTrait
{
    protected ?string $type = null;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }


}