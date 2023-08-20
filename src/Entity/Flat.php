<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueTrait;
use Maris\Symfony\Address\Traits\TypeTrait;

/**
 * Квартира
 */
class Flat extends Component
{
    /**
     * Содержит ФИАС-код квартиры для России.
     */
    use FiasTrait;

    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     */
    use TypeTrait, FullTypeTrait;

    /***
     * При привидении к строке используется номер квартиры.
     */
    use ToStringValueTrait;
}