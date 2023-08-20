<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueTrait;
use Maris\Symfony\Address\Traits\TypeTrait;

/***
 * Дом.
 */
class House extends Component{

    /**
     * Содержит ФИАС-код дома для России.
     * Содержит КЛАДР-код дома для России.
     */
    use FiasTrait, KladrTrait;

    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     */
    use TypeTrait, FullTypeTrait;

    /***
     * При привидении к строке используется номер дома.
     */
    use ToStringValueTrait;
}