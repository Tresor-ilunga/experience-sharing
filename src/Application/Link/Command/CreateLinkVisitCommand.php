<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Domain\Link\Entity\Link;

/**
 * Class CreateLinkVisitCommand
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final readonly class CreateLinkVisitCommand
{
    /**
     * The framework uses this constructor to instantiate the command.
     *
     * @param Link $link
     * @param string|null $ip
     * @param string|null $user_agent
     * @param array|null $server
     */
    public function __construct(
        public Link    $link,
        public ?string $ip,
        public ?string $user_agent,
        public ?array  $server,
    ) {
    }
}
