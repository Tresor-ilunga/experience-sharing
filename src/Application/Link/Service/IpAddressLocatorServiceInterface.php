<?php

declare(strict_types=1);

namespace Application\Link\Service;

use Domain\Link\ValueObject\Location;

/**
 * Class IpAddressLocatorServiceInterface
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
interface IpAddressLocatorServiceInterface
{
    public function getLocation(string $ip): ?Location;
}