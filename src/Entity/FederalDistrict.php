<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\ToStringValueTrait;

/**
 * Федеральный округ.
 */
class FederalDistrict extends Component{
    /**
     * Содержит только названия федерального округа
     * оно-же используется при приведении к строке.
     */
    use ToStringValueTrait;
}