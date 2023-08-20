<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueWithTypeTrait;
use Maris\Symfony\Address\Traits\TypeTrait;
use Maris\Symfony\Address\Traits\ValueWithTypeTrait;

/**
 * Улица.
 */
class Street extends Component
{
    /**
     * Содержит ФИАС-код улицы для России.
     * Содержит КЛАДР-код улицы для России.
     */
    use FiasTrait, KladrTrait;

    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     * Содержит полное название улицы с типом.
     */
    use TypeTrait, FullTypeTrait, ValueWithTypeTrait;

    /***
     * При привидении к строке используется полное название улицы с типом.
     */
    use ToStringValueWithTypeTrait;
}