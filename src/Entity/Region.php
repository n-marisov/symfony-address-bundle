<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\FiasTrait;
use Maris\Symfony\Address\Traits\IsoTrait;
use Maris\Symfony\Address\Traits\KladrTrait;

class Region extends Component
{
    use IsoTrait, FiasTrait,KladrTrait;
}