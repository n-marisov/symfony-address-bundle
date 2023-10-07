<?php

namespace Maris\Symfony\Address\Traits;

use Maris\Symfony\Address\Entity\Address;

/***
 *
 */
trait AddressAggregateNotNullTrait
{
    protected Address $address;

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return $this
     */
    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }


}