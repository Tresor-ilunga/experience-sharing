<?php

declare(strict_types=1);

namespace Application\Link\Service;

use Domain\Link\ValueObject\Location;

/**
 * interface IpAddressLocatorService.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
interface IpAddressLocatorServiceInterface
{
    /**
     * @param string $ip
     * @return Location|null
     */
    public function getLocation(string $ip): ?Location;
}