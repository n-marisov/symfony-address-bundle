<?php

namespace Maris\Symfony\Address\Traits;

use Maris\Symfony\Address\Entity\Address;

trait AddressAggregateTrait
{
    protected ?Address $address = null;

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|null $address
     * @return $this
     */
    public function setAddress(?Address $address): self
    {
        $this->address = $address;
        return $this;
    }


}