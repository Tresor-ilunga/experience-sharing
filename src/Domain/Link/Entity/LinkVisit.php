<?php

declare(strict_types=1);

namespace Domain\Link\Entity;

use Domain\Link\ValueObject\Device;
use Domain\Link\ValueObject\Location;
use Domain\Shared\Entity\IdentityTrait;
use Domain\Shared\Entity\TimestampTrait;

/**
 * class LinkVisit.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class LinkVisit
{
    use IdentityTrait;
    use TimestampTrait;

    private Link $link;

    private ?string $ip;

    private ?string $user_agent;

    private ?string $referer;

    private Location $location;

    private Device $device;

    public function __construct()
    {
        $this->location = new Location();
        $this->device = new Device();
    }

    public function getLink(): Link
    {
        return $this->link;
    }

    public function setLink(Link $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(?string $user_agent): self
    {
        $this->user_agent = $user_agent;
        return $this;
    }

    public function getReferer(): ?string
    {
        return $this->referer;
    }

    public function setReferer(?string $referer): self
    {
        $this->referer = $referer;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getDevice(): Device
    {
        return $this->device;
    }

    public function setDevice(Device $device): self
    {
        $this->device = $device;
        return $this;
    }
}