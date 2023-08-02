<?php

declare(strict_types=1);

namespace Application\Link\Command;

use Domain\Link\Entity\Link;

/**
 * class DeleteLinkCommand.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class DeleteLinkCommand
{
    /**
     * @param Link $_entity
     */
    public function __construct(
        public readonly Link $_entity
    ) {
    }
}
