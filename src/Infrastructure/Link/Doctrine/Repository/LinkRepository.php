<?php

declare(strict_types=1);

namespace Infrastructure\Link\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Link\Entity\Link;
use Domain\Link\Repository\LinkRepositoryInterface;
use Infrastructure\Shared\Doctrine\Repository\AbstractRepository;

/**
 * class LinkRepository.
 *
 * @extends AbstractRepository<Link>
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class LinkRepository extends AbstractRepository implements LinkRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Link::class);
    }

    public function isUniqueSlug(string $slug): bool
    {
        return true;
    }
}