<?php

declare(strict_types=1);

namespace Domain\Link\ValueObject;

/**
 * class Device.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class Device
{
    public function __construct(
        public readonly ?string $operating_system = null,
        public readonly ?string $client = null,
        public readonly ?string $device = null,
        public readonly bool $is_bot = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['operating_system'] ?? null,
            $data['client'] ?? null,
            $data['device'] ?? null,
            $data['is_bot'] ?? false,
        );
    }
}
