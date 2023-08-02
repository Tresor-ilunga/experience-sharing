<?php

namespace Infrastructure\Shared\Symfony;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

/**
 * class Kernel.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
