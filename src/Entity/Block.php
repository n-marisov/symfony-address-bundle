<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\FullTypeTrait;
use Maris\Symfony\Address\Traits\KladrTrait;
use Maris\Symfony\Address\Traits\ToStringValueTrait;
use Maris\Symfony\Address\Traits\TypeTrait;

/***
 * Корпус/строение
 */
class Block extends Component
{
    /***
     * Содержит короткое название типа.
     * Содержит полное название типа.
     */
    use TypeTrait, FullTypeTrait;

    /***
     * При привидении к строке используется значение.
     */
    use ToStringValueTrait;
}