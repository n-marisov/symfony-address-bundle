<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\KladrTrait;

class CityDistrict extends Component
{
    use FiasTrait, KladrTrait;
}