<?php

declare(strict_types=1);

namespace Domain\Link\Event;

use Domain\Link\Entity\Link;

/**
 * class LinkVisitedEvent.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final readonly class LinkVisitedEvent
{
    /**
     * @param string|null $ip
     * @param string|null $user_agent
     * @param array|null $server
     * @param Link $link
     */
    public function __construct(
        public ?string $ip,
        public ?string $user_agent,
        public ?array  $server,
        public Link    $link,
    ){}
}
