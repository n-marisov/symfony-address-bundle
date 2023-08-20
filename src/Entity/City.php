<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueWithTypeTrait;
use Maris\Symfony\Address\Traits\TypeTrait;
use Maris\Symfony\Address\Traits\ValueWithTypeTrait;

/**
 * Город.
 */
class City extends Component
{
    /**
     * Содержит ФИАС-код города для России.
     * Содержит КЛАДР-код города для России.
     */
    use FiasTrait, KladrTrait;

    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     * Содержит полное название города с типом.
     */
    use TypeTrait, FullTypeTrait, ValueWithTypeTrait;

    /***
     * При привидении к строке используется полное название города с типом.
     */
    use ToStringValueWithTypeTrait;
}