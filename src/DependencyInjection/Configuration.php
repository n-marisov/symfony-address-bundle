<?php

namespace Maris\Symfony\Address\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('address');
        $treeBuilder->getRootNode()
            ->children()
                # Что исключить из модели
                ->arrayNode("exclude")->defaultValue([])->end()

            ->end()
        ->end();

        return $treeBuilder;
    }
}
