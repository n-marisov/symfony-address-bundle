<?php

namespace Maris\Symfony\Address\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use IteratorAggregate;
use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Geo\Entity\Location;
use Stringable;

/**
 * Сущность адреса.
 * Итерируемый объект, перебирает компоненты адреса.
 * При приведении к строке возвращает полный юридический адрес.
 */
class Address implements Stringable, IteratorAggregate
{

    use FiasTrait, KladrTrait ;

    /**
     * @var int|null
     */
    protected ?int $id = null;

    /**
     * Короткий адрес
     * @var string
     */
    protected string $title;

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

    /***
     * Почтовый индекс.
     * Хранится как строка потому что,
     * существуют индексы которые, начинаются с 0.
     * @var string|null
     */
    protected ?string $postal = null;

    /**
     * Код ОКАТО
     * @var string|null
     */
    protected ?string $okato = null;

    /**
     * Код ОКТМО
     * @var string|null
     */
    protected ?string $oktmo = null;

    /**
     * Компоненты адреса
     * @var Collection<Component>
     */
    protected Collection $components;

    /**
     *
     */
    public function __construct()
    {
        $this->components = new ArrayCollection();
    }


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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Address
     */
    public function setTitle(string $title): Address
    {
        $this->title = $title;
        return $this;
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
     * @return Location|null
     */
    public function getLocation(): ?Location
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
     * @return string|null
     */
    public function getPostal(): ?string
    {
        return $this->postal;
    }

    /**
     * @param string|null $postal
     * @return Address
     */
    public function setPostal(?string $postal): Address
    {
        $this->postal = $postal;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getComponents(): Collection
    {
        return $this->components;
    }

    /**
     * Обновляет компонент
     * @param Component $component
     * @return Address
     */
    public function setComponent( Component $component ): Address
    {
        $component->setAddress( $this );

        foreach ($this->components as $item)
            if( $item::class == $component::class )
                $this->components->removeElement($item);
        $this->components->add( $component );
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOkato(): ?string
    {
        return $this->okato;
    }

    /**
     * @param string|null $okato
     * @return Address
     */
    public function setOkato(?string $okato): Address
    {
        $this->okato = $okato;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    /**
     * @param string|null $oktmo
     * @return Address
     */
    public function setOktmo(?string $oktmo): Address
    {
        $this->oktmo = $oktmo;
        return $this;
    }



    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->unrestricted;
    }

    /**
     * @return Collection
     */
    public function getIterator(): Collection
    {
        return $this->components;
    }
}


/***
Все тарифы

data.qc_geo	Код точности координат:
0 — точные координаты
1 — ближайший дом
2 — улица
3 — населенный пункт
4 — город
5 — координаты не определены
 */