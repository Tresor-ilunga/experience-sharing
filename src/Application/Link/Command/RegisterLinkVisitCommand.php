<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Domain\Link\Entity\Link;

/**
 * class RegisterVisitCommand.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final readonly class RegisterLinkVisitCommand
{
    /**
     * @param Link $link
     * @param string|null $ip
     * @param string|null $user_agent
     * @param string|null $referer
     * @param array $server
     */
    public function __construct(
        public Link    $link,
        public ?string $ip,
        public ?string $user_agent,
        public ?string $referer,
        public array   $server
    ) {
    }
}
