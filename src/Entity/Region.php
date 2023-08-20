<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\IsoTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueWithTypeTrait;
use Maris\Symfony\Address\Traits\TypeTrait;
use Maris\Symfony\Address\Traits\ValueWithTypeTrait;

/***
 * Регион.
 */
class Region extends Component
{

    /**
     * Содержит ISO-код региона.
     * Содержит ФИАС-код региона для России.
     * Содержит КЛАДР-код региона для России.
     */
    use IsoTrait, FiasTrait, KladrTrait;

    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     * Содержит полное название региона с типом.
     */
    use TypeTrait, FullTypeTrait, ValueWithTypeTrait;

    /***
     * При привидении к строке используется полное название региона с типом.
     */
    use ToStringValueWithTypeTrait;
}