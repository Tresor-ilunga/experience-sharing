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
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[AsMessageHandler]
final class CreateLinkHandler
{
    public function __construct(
        private readonly LinkRepositoryInterface $repository,
        private readonly MetaScrapperServiceInterface $metaScrapperService
    ) {
    }

    /**
     * @throws NonUniqueSlugException
     */
    public function __invoke(CreateLinkCommand $command): void
    {
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