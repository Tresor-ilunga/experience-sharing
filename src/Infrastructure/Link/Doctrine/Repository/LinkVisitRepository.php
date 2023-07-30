<?php

declare(strict_types=1);

namespace Infrastructure\Link\Doctrine\Repository;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Link\Entity\Link;
use Domain\Link\Entity\LinkVisit;
use Domain\Link\Repository\LinkVisitRepositoryInterface;
use Infrastructure\Shared\Doctrine\Repository\AbstractRepository;

/**
 * class LinkVisitRepository.
 *
 * @extends AbstractRepository<LinkVisit>
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class LinkVisitRepository extends AbstractRepository implements LinkVisitRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkVisit::class);
    }

    public function hasAlreadyBeenVisited(string $ip, Link $link): bool
    {
        try {
            $this->createQueryBuilder('lv')
                ->where('lv.ip = :ip')
                ->andWhere('lv.link = :link')
                ->setParameter('ip', $ip)
                ->setParameter('link', $link)
                ->getQuery()
                ->getSingleResult();
            return true;
        } catch (NoResultException) {
            return false;
        } catch (NonUniqueResultException) {
            return true;
        }
    }
}