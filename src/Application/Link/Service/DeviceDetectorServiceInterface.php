<?php

declare(strict_types=1);

namespace Application\Link\Service;

use Domain\Link\ValueObject\Device;

/**
 * interface DeviceDetectorService.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
interface DeviceDetectorServiceInterface
{
    /**
     * @param string $user_agent
     * @param array $server
     * @return Device|null
     */
    public function getDevice(string $user_agent, array $server): ?Device;
}
