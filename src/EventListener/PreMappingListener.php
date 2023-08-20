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
    /**
     * Константа с полями, где ключ название в базе данных,
     * а значение ключ в meta->fieldMappings
     */
    protected const MAPPING_FIELDS = [
        "value" => "value",
        "unrestricted_value" => "unrestricted",

        "okato" => "okato",
        "oktmo" => "oktmo",

        "postal_code" => "postalIndex",
        "postal_box" => "postalBox",

        "fias_id" => "fias",
        "region_fias_id" => "region.fias",
        "area_fias_id" => "area.fias",
        "city_fias_id" => "city.fias",
        "city_district_fias_id" => "cityDistrict.fias",
        "settlement_fias_id" => "settlement.fias",
        "street_fias_id" => "street.fias",
        "stead_fias_id" => "stead.fias",
        "house_fias_id" => "house.fias",
        "flat_fias_id" => "flat.fias",

        "address_kladr_id" => "kladr",
        "region_kladr_id" => "region.kladr",
        "area_kladr_id" => "area.kladr",
        "city_kladr_id" => "city.kladr",
        "city_district_kladr_id" => "cityDistrict.kladr",
        "settlement_kladr_id" => "settlement.kladr",
        "street_kladr_id" => "street.kladr",
        "stead_kladr_id" => "stead.kladr",
        "house_kladr_id" => "house.kladr",
        "flat_kladr_id" => "flat.kladr",
    ];

    /***
     * Массив в котором определены по несколько ячеек,
     * которые необходимо удалить при нахождение ключа.
     */
    protected const MAPPING_UNION = [

        "postal"=>[
            self::MAPPING_FIELDS["postal_code"],
            self::MAPPING_FIELDS["postal_box"],
        ],

        "fias" =>[
            "fias",
            "region.fias",
            "area.fias",
            "city.fias",
            "cityDistrict.fias",
            "settlement.fias",
            "street.fias",
            "stead.fias",
            "house.fias",
            "flat.fias"
        ],

        "kladr" =>[
            "kladr",
            "region.kladr",
            "area.kladr",
            "city.kladr",
            "cityDistrict.kladr",
            "settlement.kladr",
            "street.kladr",
            "stead.kladr",
            "house.kladr",
            "flat.kladr"
        ],

        "type"=>[

        ],

        'with_type' =>[

        ]

    ];




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

        if($meta->name !== Address::class)
            return;

        # Удаляем поля по названию ключа в БД.
        foreach (self::MAPPING_FIELDS as $field => $key )
            if( in_array( $field, $this->mappingExclude) && isset( $meta->fieldMappings[$key] ))
                unset($meta->fieldMappings[ $key ]);

        # Удаляем группы полей.
        foreach (self::MAPPING_UNION as $exclude => $fieldList)
            if( in_array( $exclude, $this->mappingExclude) )
                foreach ($fieldList as $key)
                    if(isset($meta->fieldMappings[ $key ]))
                        unset($meta->fieldMappings[ $key ]);

        dump( $meta->fieldMappings );
    }

}