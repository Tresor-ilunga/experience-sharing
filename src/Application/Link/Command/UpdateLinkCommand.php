<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Application\Shared\Mapper;
use Domain\Link\Entity\Link;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * class UpdateLinkCommand.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final class UpdateLinkCommand
{
    /**
     * @param Link $_entity
     * @param string|null $url
     * @param string|null $description
     * @param bool $has_automatic_redirect
     * @param int $redirect_delay
     */
    public function __construct(
        public readonly Link $_entity,
        #[Assert\NotBlank] #[Assert\Url] public ?string $url = null,
        #[Assert\Length(max: 500)] public ?string $description = null,
        public bool $has_automatic_redirect = false,
        #[Assert\GreaterThanOrEqual(5)] #[Assert\LessThanOrEqual(60)]
        public int $redirect_delay = 5
    ) {
        Mapper::hydrate($this->_entity, $this);
    }
}