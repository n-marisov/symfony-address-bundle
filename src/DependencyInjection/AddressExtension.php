<?php

namespace Maris\Symfony\Address\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AddressExtension extends Extension
{
    /**
     * Загружаем файл конфигурации
     * @inheritDoc
     */
    public function load( array $configs, ContainerBuilder $container )
    {

        $config = $this->processConfiguration( new Configuration() , $configs );

        $path = realpath(dirname(__DIR__) . '/../config');
        $loader = new YamlFileLoader( $container, new FileLocator( $path ) );
        $loader->load('services.yaml');

        # Что исключать из модели.
        $container->setParameter("address.model.exclude", $config["exclude"] ?? [] );

    }
}