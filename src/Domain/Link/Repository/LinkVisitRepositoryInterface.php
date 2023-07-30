<?php

declare(strict_types=1);

namespace Domain\Link\Repository;

use Domain\Link\Entity\Link;
use Domain\Shared\Repository\DataRepositoryInterface;

/**
 * Class LinkVisitRepositoryInterface.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
interface LinkVisitRepositoryInterface extends DataRepositoryInterface
{
    public function hasAlreadyBeenVisited(string $ip, Link $link): bool;
}