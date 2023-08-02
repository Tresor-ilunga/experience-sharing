<?php

declare(strict_types=1);

namespace Domain\Shared\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use Domain\Authentication\Entity\User;
use Domain\Link\Entity\Link;
use Domain\Link\Entity\LinkVisit;

/**
 * Trait TimestampTrait.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
trait TimestampTrait
{
    /**
     * @var DateTimeImmutable|null
     */
    protected ?DateTimeImmutable $created_at = null;

    /**
     * @var DateTimeImmutable|null
     */
    protected ?DateTimeImmutable $updated_at = null;

    /**
     * @return void
     */
    public function setCreatedAtWithCurrentTime(): void
    {
        if (null !== $this->created_at) {
            $this->created_at = new DateTimeImmutable();
        }
    }

    /**
     * @return void
     */
    public function setUpdatedAtWithCurrentTime(): void
    {
        $this->updated_at = new DateTimeImmutable();
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    /**
     * @param DateTimeInterface|string|null $created_at
     * @return TimestampTrait|User|Link|LinkVisit
     */
    public function setCreatedAt(DateTimeInterface|string|null $created_at): self
    {
        $this->created_at = $this->createDateTime($created_at);

        return $this;
    }

    /**
     * @param DateTimeInterface|string|null $date
     * @return DateTimeImmutable|null
     */
    public function createDateTime(DateTimeInterface|string|null $date): ?DateTimeImmutable
    {
        if (is_string($date)) {
            $datetime = DateTimeImmutable::createFromFormat('Y-m-d H:i', $date);

            return false === $datetime ? null : $datetime;
        } elseif ($date instanceof DateTimeInterface) {
            return DateTimeImmutable::createFromInterface($date);
        }

        return null;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updated_at;
    }

    /**
     * @param DateTimeInterface|string|null $updated_at
     * @return TimestampTrait|User|Link|LinkVisit
     */
    public function setUpdatedAt(DateTimeInterface|string|null $updated_at): self
    {
        $this->updated_at = $this->createDateTime($updated_at);

        return $this;
    }
}
