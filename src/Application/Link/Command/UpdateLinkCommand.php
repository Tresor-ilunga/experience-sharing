<?php

declare(strict_types=1);

namespace Application\Link\Command;

//use Application\Shared\Mapper;
use Domain\Link\Entity\Link;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * class UpdateLinkCommand.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class UpdateLinkCommand
{
    public function __construct(
        public readonly Link $_entity,
        #[Assert\NotBlank] #[Assert\Url] public ?string $url = null,
        #[Assert\Length(max: 500)] public ?string $description = null,
        public bool $has_automatic_redirect = false,
        #[Assert\GreaterThanOrEqual(5)] #[Assert\LessThanOrEqual(60)]
        public int $redirect_delay = 5
    ) {
       // Mapper::hydrate($this->_entity, $this);
    }
}