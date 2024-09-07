<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Domain\Link\Entity\Link;

/**
 * class DeleteLinkCommand.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final readonly class DeleteLinkCommand
{
    /**
     * @param Link $_entity
     */
    public function __construct(
        public Link $_entity
    ) {
    }
}
