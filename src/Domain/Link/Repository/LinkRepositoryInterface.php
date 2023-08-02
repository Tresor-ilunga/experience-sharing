<?php

declare(strict_types=1);

namespace Domain\Link\Repository;

use Domain\Link\Entity\Link;
use Domain\Shared\Repository\DataRepositoryInterface;

/**
 * Interface LinkRepositoryInterface.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
interface LinkRepositoryInterface extends DataRepositoryInterface
{
    public function isUniqueSlug(string $slug): bool;
}
