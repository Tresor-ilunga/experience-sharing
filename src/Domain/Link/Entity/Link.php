<?php

declare(strict_types=1);

namespace Domain\Link\Entity;

use Domain\Link\ValueObject\LinkMeta;
use Domain\Shared\Entity\IdentityTrait;
use Domain\Shared\Entity\TimestampTrait;

/**
 * class Link.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class Link
{
    use IdentityTrait;
    use TimestampTrait;

    private ?string $url = null;

    private ?string $slug = null;

    private ?string $description = null;

    private int $click_count = 0;

    private int $unique_visit_count = 0;

    private int $total_visit_count = 0;

    private bool $has_automatic_redirect = false;

    private int $redirect_delay = 5;

    private ?LinkMeta $meta = null;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getClickCount(): int
    {
        return $this->click_count;
    }

    public function setClickCount(int $click_count): self
    {
        $this->click_count = $click_count;
        return $this;
    }

    public function getUniqueVisitCount(): int
    {
        return $this->unique_visit_count;
    }

    public function setUniqueVisitCount(int $unique_visit_count): self
    {
        $this->unique_visit_count = $unique_visit_count;
        return $this;
    }

    public function getTotalVisitCount(): int
    {
        return $this->total_visit_count;
    }

    public function setTotalVisitCount(int $total_visit_count): self
    {
        $this->total_visit_count = $total_visit_count;
        return $this;
    }

    public function incrementTotalVisitCount(int $increment = 1): self
    {
        $this->total_visit_count += $increment;

        return $this;
    }

    public function incrementUniqueVisitCount(int $increment = 1): self
    {
        $this->unique_visit_count += $increment;

        return $this;
    }

    public function hasAutomaticRedirect(): bool
    {
        return $this->has_automatic_redirect;
    }

    public function setHasAutomaticRedirect(bool $has_automatic_redirect): self
    {
        $this->has_automatic_redirect = $has_automatic_redirect;
        return $this;
    }

    public function getMeta(): ?LinkMeta
    {
        return $this->meta;
    }

    public function setMeta(?LinkMeta $meta): self
    {
        $this->meta = $meta;
        return $this;
    }

    public function getRedirectDelay(): int
    {
        return $this->redirect_delay;
    }

    public function setRedirectDelay(int $redirect_delay): self
    {
        $this->redirect_delay = $redirect_delay;
        return $this;
    }
}