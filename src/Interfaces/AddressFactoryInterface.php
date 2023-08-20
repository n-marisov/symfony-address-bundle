<?php

namespace Maris\Symfony\Address\Interfaces;

use Maris\Symfony\Address\Entity\Address;

/***
 * Фабрика для создания адреса.
 */
interface AddressFactoryInterface
{
    public function fromArray( array $data ):?Address;
}