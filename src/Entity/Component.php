<?php

namespace Maris\Symfony\Address\Entity;

use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PrePersistEventArgs;
use function Symfony\Component\String\u;

abstract class Component implements \Stringable
{
    protected ?int $id = null;

    /**
     * Адрес, которому принадлежит компонент.
     * @var Address
     */
    protected Address $address;


    /**
     * Значение компонента
     * @var string|null
     */
    protected ?string $value = null;

    /**
     * Сокращенное название типа компонента.
     * @var string|null
     */
    protected ?string $type = null;

    /**
     * Полное название типа компонента.
     * @var string|null
     */
    protected ?string $fullType = null;

    protected ?string $valueWithType = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Component
     */
    public function setAddress( Address $address ): Component
    {
        $this->address = $address;

        if( !$address->getComponents()->contains( $this ) )
            $address->getComponents()->add($this);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return Component
     */
    public function setValue(?string $value): Component
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Component
     */
    public function setType(?string $type): Component
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullType(): ?string
    {
        return $this->fullType;
    }

    /**
     * @param string|null $fullType
     * @return Component
     */
    public function setFullType(?string $fullType): Component
    {
        $this->fullType = $fullType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValueWithType(): ?string
    {
        return $this->valueWithType;
    }

    /**
     * @param string|null $valueWithType
     * @return Component
     */
    public function setValueWithType(?string $valueWithType): Component
    {
        $this->valueWithType = $valueWithType;
        return $this;
    }

    /**
     * При привидении к строке всегда
     * возвращает название
     * с типом.
     * @return string
     */
    public function __toString(): string
    {
        return $this->valueWithType;
    }


}