<?php

declare(strict_types=1);

namespace Domain\Shared\Entity;


use Symfony\Component\Uid\Uuid;

/**
 * Trait IdentityTrait.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
trait IdentityTrait
{
    protected ?Uuid $id = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function setId(Uuid|string $id): self
    {
        $this->id = match (true) {
            $id instanceof Uuid => $id,
            default => Uuid::fromString($id)
        };

        return $this;
    }
}
