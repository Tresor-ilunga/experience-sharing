<?php

declare(strict_types=1);

namespace Domain\Link\ValueObject;

/**
 * class Location.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
class Location
{
    /**
     * @param string|null $country
     * @param string|null $city
     * @param string|null $time_zone
     * @param float|null $longitude
     * @param float|null $latitude
     * @param int|null $accuracy_radius
     */
    public function __construct(
        public readonly ?string $country = null,
        public readonly ?string $city = null,
        public readonly ?string $time_zone = null,
        public readonly ?float $longitude = null,
        public readonly ?float $latitude = null,
        public readonly ?int $accuracy_radius = null,
    ) {
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['country'] ?? null,
            $data['city'] ?? null,
            $data['time_zone'] ?? null,
            $data['longitude'] ?? null,
            $data['latitude'] ?? null,
            $data['accuracy_radius'] ?? null,
        );
    }
}
