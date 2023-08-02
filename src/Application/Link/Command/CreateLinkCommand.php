<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * class CreateLinkCommand.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class CreateLinkCommand
{
    public function __construct(
        #[Assert\NotBlank] #[Assert\Url] public ?string $url = null,
        #[Assert\Length(max: 255)] public ?string $slug = null,
        #[Assert\Length(max: 500)] public ?string $description = null,
        public bool $has_automatic_redirect = false,
        #[Assert\GreaterThanOrEqual(5)] #[Assert\LessThanOrEqual(60)]
        public int $redirect_delay = 5
    ) {
    }
}
