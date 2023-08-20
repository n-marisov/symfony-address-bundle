<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\IsoTrait;
use Maris\Symfony\Address\Traits\ToStringValueTrait;

/***
 * Страна.
 */
class Country extends Component
{
    /**
     * Содержит ISO CODE.
     * При привидении к строке используется название страны.
     */
    use IsoTrait, ToStringValueTrait;
}