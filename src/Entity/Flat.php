<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\KladrTrait;

/**
 * Квартира
 */
class Flat extends Component
{
    use FiasTrait, KladrTrait;
}