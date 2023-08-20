<?php

namespace Maris\Symfony\Address\EventListener;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use Maris\Symfony\Address\Entity\Address;

/**
 * Изменяем сущности исходя из настроек непосредственно
 * перед Mapping.
 */
//#[AsDoctrineListener( event: Events::loadClassMetadata , priority: 100, connection: "default" )]
class PreMappingListener
{
    /***
     * Ключи которые нужно исключить.
     * @var array
     */
    protected array $mappingExclude;

    /**
     * @param array $mappingExclude
     */
    public function __construct(array $mappingExclude)
    {
        $this->mappingExclude = $mappingExclude;
    }


    /**
     * Главный метод события.
     * @param LoadClassMetadataEventArgs $args
     * @return void
     */
    public function __invoke( LoadClassMetadataEventArgs $args ):void
    {
        $meta = $args->getClassMetadata();
        match ($meta->name){
            Address::class => $this->updateAddress( $meta ),
            default => null
        };
    }

    /***
     * Обновляет сущность адреса
     * @param ClassMetadata $m
     * @return void
     */
    protected function updateAddress( ClassMetadata $m ):void
    {

        dump( $m );

        if(in_array("fias",$this->mappingExclude))
            unset($m->fieldMappings["fias_id"]);

        if(in_array("kladr",$this->mappingExclude))
            unset($m->fieldMappings["kladr_id"]);

        if(in_array("okato",$this->mappingExclude))
            unset($m->fieldMappings["okato"]);

        if(in_array("oktmo",$this->mappingExclude))
            unset($m->fieldMappings["oktmo"]);

    }

}