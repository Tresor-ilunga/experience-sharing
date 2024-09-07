<?php

declare(strict_types=1);

namespace Application\Link\Handler;

use Application\Link\Command\CreateLinkCommand;
use Application\Link\Service\MetaScrapperServiceInterface;
use Application\Shared\Mapper;
use Domain\Link\Entity\Link;
use Domain\Link\Exception\NonUniqueSlugException;
use Domain\Link\Repository\LinkRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class CreateLinkHandler.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
#[AsMessageHandler]
final readonly class CreateLinkHandler
{
    /**
     * This is the constructor of the class.
     *
     * @param LinkRepositoryInterface $repository
     * @param MetaScrapperServiceInterface $metaScrapperService
     */
    public function __construct(
        private LinkRepositoryInterface      $repository,
        private MetaScrapperServiceInterface $metaScrapperService
    ) {
    }

    /**
     * This is the function that handles the command.
     *
     * @throws NonUniqueSlugException
     */
    public function __invoke(CreateLinkCommand $command): void
    {
        if ($this->repository->isUniqueSlug($command->slug)) {
            throw new NonUniqueSlugException();
        }

        if ($command->slug === null) {
            $command->slug = uniqid();
        }


        $link = Mapper::getHydratedObject($command, new Link());
        $link->setMeta(
            $this->metaScrapperService->getMeta((string) $command->url)
        );

        $this->repository->save($link);
    }
}
