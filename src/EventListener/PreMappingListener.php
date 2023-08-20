<?php

namespace Maris\Symfony\Address\EventListener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use Maris\Symfony\Address\Entity\Address;

/**
 * Изменяем сущности исходя из настроек непосредственно
 * перед Mapping.
 */
class PreMappingListener
{

    /***
     * Поля для обновления названия столбцов.
     */
    protected const MAPPING_UPDATE_COLUMN_NAME = [
        "location.latitude" => "geo_lat",
        "location.longitude" => "geo_lon",
        "country.value" => "country",
        "federalDistrict.value" => "federal_district",
        "region.value" => "region",
        "area.value" => "area",
        "city.value" => "city",
        "cityDistrict.value" => "city_district",
        "settlement.value" => "settlement",
        "street.value" => "street",
        "stead.value" => "stead",
        "house.value" => "house",
        "block.value" => "block",
        "flat.value" => "flat",
    ];

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

        "geo_lat" => "location.latitude",
        "geo_lon" => "location.longitude",


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

        "kladr_id" => "kladr",
        "region_kladr_id" => "region.kladr",
        "area_kladr_id" => "area.kladr",
        "city_kladr_id" => "city.kladr",
        "city_district_kladr_id" => "cityDistrict.kladr",
        "settlement_kladr_id" => "settlement.kladr",
        "street_kladr_id" => "street.kladr",
        "stead_kladr_id" => "stead.kladr",
        "house_kladr_id" => "house.kladr",
        "flat_kladr_id" => "flat.kladr",

        "country_iso_code" => "country.iso",
        "federal_district" => "federalDistrict.value",
        "region_iso_code" => "region.iso",
        "region_type" => "region.type",
        "region_type_full" => "region.fullType",
        "region_with_type" => "region.valueWithType",

        "area_type" => "area.type",
        "area_type_full" => "area.fullType",
        "area_with_type" => "area.valueWithType",

        "city_type" => "city.type",
        "city_type_full" => "city.fullType",
        "city_with_type" => "city.valueWithType",

        "city_district_type" => "cityDistrict.type",
        "city_district_type_full" => "cityDistrict.fullType",
        "city_district_with_type" => "cityDistrict.valueWithType",

        "settlement_type" => "settlement.type",
        "settlement_type_full" => "settlement.fullType",
        "settlement_with_type" => "settlement.valueWithType",

        "street_type" => "street.type",
        "street_type_full" => "street.fullType",
        "street_with_type" => "street.valueWithType",

        "stead_type" => "stead.type",
        "stead_type_full" => "stead.fullType",
        "stead_with_type" => "stead.valueWithType",

        "house_type" => "house.type",
        "house_type_full" => "house.fullType",
        "house_with_type" => "house.valueWithType",

        "block_type" => "block.type",
        "block_type_full" => "block.fullType",
        "block_with_type" => "block.valueWithType",

        "flat_type" => "flat.type",
        "flat_type_full" => "flat.fullType",
        "flat_with_type" => "flat.valueWithType",
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
            self::MAPPING_FIELDS["fias_id"],
            self::MAPPING_FIELDS["region_fias_id"],
            self::MAPPING_FIELDS["area_fias_id"],
            self::MAPPING_FIELDS["city_fias_id"],
            self::MAPPING_FIELDS["city_district_fias_id"],
            self::MAPPING_FIELDS["settlement_fias_id"],
            self::MAPPING_FIELDS["street_fias_id"],
            self::MAPPING_FIELDS["stead_fias_id"],
            self::MAPPING_FIELDS["house_fias_id"],
            self::MAPPING_FIELDS["flat_fias_id"],
        ],

        "kladr" =>[
            self::MAPPING_FIELDS["kladr_id"],
            self::MAPPING_FIELDS["region_kladr_id"],
            self::MAPPING_FIELDS["area_kladr_id"],
            self::MAPPING_FIELDS["city_kladr_id"],
            self::MAPPING_FIELDS["city_district_kladr_id"],
            self::MAPPING_FIELDS["settlement_kladr_id"],
            self::MAPPING_FIELDS["street_kladr_id"],
            self::MAPPING_FIELDS["stead_kladr_id"],
            self::MAPPING_FIELDS["house_kladr_id"],
            self::MAPPING_FIELDS["flat_kladr_id"],
        ],

        "type"=>[
            self::MAPPING_FIELDS["region_type"],
            self::MAPPING_FIELDS["area_type"],
            self::MAPPING_FIELDS["city_type"],
            self::MAPPING_FIELDS["city_district_type"],
            self::MAPPING_FIELDS["settlement_type"],
            self::MAPPING_FIELDS["street_type"],
            self::MAPPING_FIELDS["stead_type"],
            self::MAPPING_FIELDS["house_type"],
            self::MAPPING_FIELDS["flat_type"]
        ],

        "type_full"=>[
            self::MAPPING_FIELDS["region_type_full"],
            self::MAPPING_FIELDS["area_type_full"],
            self::MAPPING_FIELDS["city_type_full"],
            self::MAPPING_FIELDS["city_district_type_full"],
            self::MAPPING_FIELDS["settlement_type_full"],
            self::MAPPING_FIELDS["street_type_full"],
            self::MAPPING_FIELDS["stead_type_full"],
            self::MAPPING_FIELDS["house_type_full"],
            self::MAPPING_FIELDS["flat_type_full"],
        ],

        'with_type' =>[
            self::MAPPING_FIELDS["region_with_type"],
            self::MAPPING_FIELDS["area_with_type"],
            self::MAPPING_FIELDS["city_with_type"],
            self::MAPPING_FIELDS["city_district_with_type"],
            self::MAPPING_FIELDS["settlement_with_type"],
            self::MAPPING_FIELDS["street_with_type"],
            self::MAPPING_FIELDS["stead_with_type"],
            self::MAPPING_FIELDS["house_with_type"],
            self::MAPPING_FIELDS["flat_with_type"],
        ],

        "location" =>[ self::MAPPING_FIELDS["geo_lat"], self::MAPPING_FIELDS["geo_lon"] ],

        "country" =>[ "country.value", self::MAPPING_FIELDS["country_iso_code"] ],

        "region" =>[
            "region.value",
            self::MAPPING_FIELDS["region_type"],
            self::MAPPING_FIELDS["region_type_full"],
            self::MAPPING_FIELDS["region_with_type"],
            self::MAPPING_FIELDS["region_iso_code"],
            self::MAPPING_FIELDS["region_fias_id"],
            self::MAPPING_FIELDS["region_kladr_id"],
        ],
        "area" =>[
            "area.value",
            self::MAPPING_FIELDS["area_type"],
            self::MAPPING_FIELDS["area_type_full"],
            self::MAPPING_FIELDS["area_with_type"],
            self::MAPPING_FIELDS["area_fias_id"],
            self::MAPPING_FIELDS["area_kladr_id"]
        ],
        "city" =>[
            "city.value",
            self::MAPPING_FIELDS["city_type"],
            self::MAPPING_FIELDS["city_type_full"],
            self::MAPPING_FIELDS["city_with_type"],
            self::MAPPING_FIELDS["city_fias_id"],
            self::MAPPING_FIELDS["city_kladr_id"]
        ],
        "city_district" =>[
            "cityDistrict.value",
            self::MAPPING_FIELDS["city_district_type"],
            self::MAPPING_FIELDS["city_district_type_full"],
            self::MAPPING_FIELDS["city_district_with_type"],
            self::MAPPING_FIELDS["city_district_fias_id"],
            self::MAPPING_FIELDS["city_district_kladr_id"]
        ],
        "settlement" =>[
            "settlement.value",
            self::MAPPING_FIELDS["settlement_type"],
            self::MAPPING_FIELDS["settlement_type_full"],
            self::MAPPING_FIELDS["settlement_with_type"],
            self::MAPPING_FIELDS["settlement_fias_id"],
            self::MAPPING_FIELDS["settlement_kladr_id"]
        ],
        "street" =>[
            "street.value",
            self::MAPPING_FIELDS["street_type"],
            self::MAPPING_FIELDS["street_type_full"],
            self::MAPPING_FIELDS["street_with_type"],
            self::MAPPING_FIELDS["street_fias_id"],
            self::MAPPING_FIELDS["street_kladr_id"]
        ],
        "stead" =>[
            "stead.value",
            self::MAPPING_FIELDS["stead_type"],
            self::MAPPING_FIELDS["stead_type_full"],
            self::MAPPING_FIELDS["stead_with_type"],
            self::MAPPING_FIELDS["stead_fias_id"],
            self::MAPPING_FIELDS["stead_kladr_id"]
        ],
        "house" =>[
            "house.value",
            self::MAPPING_FIELDS["house_type"],
            self::MAPPING_FIELDS["house_type_full"],
            self::MAPPING_FIELDS["house_with_type"],
            self::MAPPING_FIELDS["house_fias_id"],
            self::MAPPING_FIELDS["house_kladr_id"]
        ],
        "block" =>[
            "block.value",
            self::MAPPING_FIELDS["block_type"],
            self::MAPPING_FIELDS["block_type_full"],
            self::MAPPING_FIELDS["block_with_type"]
        ],
        "flat" =>[
            "flat.value",
            self::MAPPING_FIELDS["flat_type"],
            self::MAPPING_FIELDS["flat_type_full"],
            self::MAPPING_FIELDS["flat_with_type"],
            self::MAPPING_FIELDS["flat_fias_id"],
            self::MAPPING_FIELDS["flat_kladr_id"]
        ],

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

        $this->columnNamesUpdate( $meta );

        dump( $meta->fieldMappings );
    }


    /***
     * Обновляет названия колонок в базе данных.
     * @param ClassMetadata $meta
     * @return void
     */
    protected function columnNamesUpdate( ClassMetadata $meta ):void
    {
        foreach (self::MAPPING_UPDATE_COLUMN_NAME as $metaKey => $columName )
            if(isset( $meta->fieldMappings[$metaKey] ))
                $meta->fieldMappings[$metaKey]["columnName"] = $columName;
    }

}