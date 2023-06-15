<?php

declare(strict_types=1);

namespace Domain\Link\ValueObject;

/**
 * class LinkMeta.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class LinkMeta
{
    public function __construct(
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?string $canonical_url,
        public readonly ?string $image,
        public readonly ?string $favicon
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'] ?? null,
            $data['description'] ?? null,
            $data['canonical_url'] ?? null,
            $data['image'] ?? null,
            $data['favicon'] ?? null
        );
    }
}
