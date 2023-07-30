<?php

declare(strict_types=1);

namespace Application\Link\Command;
use Domain\Link\Entity\Link;

/**
 * Class CreateLinkCommand
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class CreateLinkVisitCommand
{
    public function __construct(
        public readonly Link $link,
        public readonly ?string $ip,
        public readonly ?string $user_agent,
        public readonly ?array $server,
    ) {
    }
}