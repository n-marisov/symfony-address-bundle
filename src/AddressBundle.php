<?php

namespace Maris\Symfony\Address;

use Maris\Symfony\Address\DependencyInjection\AddressExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class AddressBundle extends AbstractBundle{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new AddressExtension();
    }

}