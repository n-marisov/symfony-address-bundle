<?php

namespace Maris\Symfony\Address\Interfaces;

use Maris\Symfony\Address\Entity\Address;

/***
 * Интерфейс для объектов которые могут хранить в себе адрес.
 */
interface AddressAggregateInterface
{
    /**
     * Возвращает адрес.
     * @return Address
     */
    public function getAddress():Address;
}