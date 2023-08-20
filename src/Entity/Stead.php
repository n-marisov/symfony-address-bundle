<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueTrait;
use Maris\Symfony\Address\Traits\ToStringValueWithTypeTrait;
use Maris\Symfony\Address\Traits\TypeTrait;
use Maris\Symfony\Address\Traits\ValueWithTypeTrait;

/***
 * Земельный участок.
 */
class Stead extends Component
{
    /**
    * Содержит ФИАС-код земельного участка для России.
    * Содержит КЛАДР-код земельного участка для России.
    */
    use FiasTrait, KladrTrait;

    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     */
    use TypeTrait, FullTypeTrait;

    /***
     * При привидении к строке используется номер земельного участка.
     */
    use ToStringValueTrait;
}