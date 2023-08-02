<?php

declare(strict_types=1);

namespace Domain\Shared\Entity;


use Domain\Authentication\Entity\User;
use Domain\Link\Entity\Link;
use Domain\Link\Entity\LinkVisit;
use Symfony\Component\Uid\Uuid;

/**
 * Trait IdentityTrait.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
trait IdentityTrait
{
    /**
     * @var Uuid|null
     */
    protected ?Uuid $id = null;

    /**
     * @return Uuid|null
     */
    public function getId(): ?Uuid
    {
        return $this->id;
    }

    /**
     * @param Uuid|string $id
     * @return User|Link|LinkVisit|IdentityTrait
     */
    public function setId(Uuid|string $id): self
    {
        $this->id = match (true) {
            $id instanceof Uuid => $id,
            default => Uuid::fromString($id)
        };

        return $this;
    }
}
