<?php

declare(strict_types=1);

namespace Domain\Link\Repository;

use Domain\Link\Entity\Link;
use Domain\Shared\Repository\DataRepositoryInterface;

/**
 * Interface LinkVisitRepositoryInterface.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
interface LinkVisitRepositoryInterface extends DataRepositoryInterface
{
    /**
     * @param string $ip
     * @param Link $link
     * @return bool
     */
    public function hasAlreadyBeenVisited(string $ip, Link $link): bool;
}
