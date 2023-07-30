<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Domain\Link\Entity\Link;

/**
 * class RegisterVisitCommand.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class RegisterLinkVisitCommand
{
    public function __construct(
        public readonly Link $link,
        public readonly ?string $ip,
        public readonly ?string $user_agent,
        public readonly ?string $referer,
        public readonly array $server
    ) {
    }
}