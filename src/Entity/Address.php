<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Interfaces\Geo\Aggregate\LocationAggregateInterface;
use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\OkatoTrait;
use Maris\Symfony\Address\Traits\OktmoTrait;
use Maris\Symfony\Address\Traits\PostalTrait;
use Maris\Symfony\Address\Traits\ValueTrait;
use Maris\Symfony\Geo\Embeddable\Model\Entity\Location;
use Stringable;

/**
 * Сущность адреса.
 * При приведении к строке возвращает полный юридический адрес.
 */
class Address implements Stringable, LocationAggregateInterface
{
    /**
     * Содержит ФИАС-код адреса для России.
     * Содержит КЛАДР-код адреса для России.
     */
    use FiasTrait, KladrTrait ;

    /***
     * Хранит код ОКАТО.
     * Хранит код ОКТМО.
     */
    use OkatoTrait, OktmoTrait;

    /***
     * Почтовые данные адреса.
     */
    use PostalTrait;

    /***
     * Хранит короткий адрес.
     */
    use ValueTrait;
    /**
     * @var int|null
     */
    protected ?int $id = null;

    /**
     * Полный юридический адрес с почтовым индексом
     * @var string|null
     */
    protected ?string $unrestricted = null;

    /**
     * Географические координаты
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * Страна.
     * @var Country|null
     */
    protected ?Country $country = null;

    /**
     * Федеральный округ для России.
     * @var FederalDistrict|null
     */
    protected ?FederalDistrict $federalDistrict = null;

    /***
     * Регион.
     * @var Region|null
     */
    protected ?Region $region = null;

    /**
     * Район в регионе.
     * @var Area|null
     */
    protected ?Area $area = null;

    /**
     * Город.
     * @var City|null
     */
    protected ?City $city = null;

    /**
     * Район города.
     * @var CityDistrict|null
     */
    protected ?CityDistrict $cityDistrict = null;

    /**
     * Населенный пункт.
     * @var Settlement|null
     */
    protected ?Settlement $settlement = null;

    /**
     * Улица.
     * @var Street|null
     */
    protected ?Street $street = null;

    /***
     * Земельный участок.
     * @var Stead|null
     */
    protected ?Stead $stead = null;

    /**
     * Дом.
     * @var House|null
     */
    protected ?House $house = null;

    /**
     * Корпус/Строение.
     * @var Block|null
     */
    protected ?Block $block = null;

    /**
     * Квартира.
     * @var Flat|null
     */
    protected ?Flat $flat = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUnrestricted(): string
    {
        return $this->unrestricted;
    }

    /**
     * @param string $unrestricted
     * @return Address
     */
    public function setUnrestricted(string $unrestricted): Address
    {
        $this->unrestricted = $unrestricted;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     * @return Address
     */
    public function setLocation(?Location $location): Address
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     * @return $this
     */
    public function setCountry(?Country $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return FederalDistrict
     */
    public function getFederalDistrict(): FederalDistrict
    {
        return $this->federalDistrict;
    }

    /**
     * @param FederalDistrict $federalDistrict
     * @return $this
     */
    public function setFederalDistrict(FederalDistrict $federalDistrict): self
    {
        $this->federalDistrict = $federalDistrict;
        return $this;
    }

    /**
     * @return Region|null
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @param Region|null $region
     * @return $this
     */
    public function setRegion(?Region $region): self
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return Area|null
     */
    public function getArea(): ?Area
    {
        return $this->area;
    }

    /**
     * @param Area|null $area
     * @return $this
     */
    public function setArea(?Area $area): self
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return $this
     */
    public function setCity(City $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return CityDistrict
     */
    public function getCityDistrict(): CityDistrict
    {
        return $this->cityDistrict;
    }

    /**
     * @param CityDistrict $cityDistrict
     * @return $this
     */
    public function setCityDistrict(CityDistrict $cityDistrict): self
    {
        $this->cityDistrict = $cityDistrict;
        return $this;
    }

    /**
     * @return Settlement
     */
    public function getSettlement(): Settlement
    {
        return $this->settlement;
    }

    /**
     * @param Settlement $settlement
     * @return $this
     */
    public function setSettlement(Settlement $settlement): self
    {
        $this->settlement = $settlement;
        return $this;
    }

    /**
     * @return Stead
     */
    public function getStead(): Stead
    {
        return $this->stead;
    }

    /**
     * @param Stead $stead
     * @return $this
     */
    public function setStead(Stead $stead): self
    {
        $this->stead = $stead;
        return $this;
    }

    /**
     * @return Street
     */
    public function getStreet(): Street
    {
        return $this->street;
    }

    /**
     * @param Street $street
     * @return $this
     */
    public function setStreet(Street $street): self
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return House
     */
    public function getHouse(): House
    {
        return $this->house;
    }

    /**
     * @param House $house
     * @return $this
     */
    public function setHouse(House $house): self
    {
        $this->house = $house;
        return $this;
    }

    /**
     * @return Block
     */
    public function getBlock(): Block
    {
        return $this->block;
    }

    /**
     * @param Block $block
     * @return $this
     */
    public function setBlock(Block $block): self
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @return Flat
     */
    public function getFlat(): Flat
    {
        return $this->flat;
    }

    /**
     * @param Flat $flat
     * @return $this
     */
    public function setFlat(Flat $flat): self
    {
        $this->flat = $flat;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->unrestricted;
    }
}