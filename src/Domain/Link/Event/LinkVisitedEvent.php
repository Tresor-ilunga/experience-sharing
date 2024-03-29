<?php

declare(strict_types=1);

namespace Domain\Link\Event;

use Domain\Link\Entity\Link;

/**
 * class LinkVisitedEvent.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class LinkVisitedEvent
{
    /**
     * @param string|null $ip
     * @param string|null $user_agent
     * @param array|null $server
     * @param Link $link
     */
    public function __construct(
        public readonly ?string $ip,
        public readonly ?string $user_agent,
        public readonly ?array $server,
        public readonly Link $link,
    ){}
}
