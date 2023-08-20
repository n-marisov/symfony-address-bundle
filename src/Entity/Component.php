<?php

namespace Maris\Symfony\Address\Entity;

use Maris\Symfony\Address\Traits\ValueTrait;
use Stringable;

/***
 * Компонент адреса.
 */
abstract class Component implements Stringable
{
    use ValueTrait;
}