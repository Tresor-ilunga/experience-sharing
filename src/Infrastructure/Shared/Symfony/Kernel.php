<?php

namespace Infrastructure\Shared\Symfony;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

/**
 * class Kernel.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
