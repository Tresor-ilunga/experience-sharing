<?php

declare(strict_types=1);

namespace Application\Link\Service;

use Domain\Link\ValueObject\Device;

/**
 * interface DeviceDetectorService.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
interface DeviceDetectorServiceInterface
{
    /**
     * This method returns a Device object.
     *
     * @param string $user_agent
     * @param array $server
     * @return Device|null
     */
    public function getDevice(string $user_agent, array $server): ?Device;
}
