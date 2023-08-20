<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueWithTypeTrait;
use Maris\Symfony\Address\Traits\TypeTrait;
use Maris\Symfony\Address\Traits\ValueWithTypeTrait;

/**
 * Район в регионе.
 */
class Area extends Component
{
    /**
     * Содержит ФИАС-код района в регионе для России.
     * Содержит КЛАДР-код района в регионе для России.
     */
    use FiasTrait, KladrTrait;
    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     * Содержит полное название района в регионе с типом.
     */
    use TypeTrait, FullTypeTrait, ValueWithTypeTrait;

    /***
     * При привидении к строке используется полное название района в регионе с типом.
     */
    use ToStringValueWithTypeTrait;
}