<?php

declare(strict_types=1);

namespace Application\Link\Handler;

use Application\Link\Command\UpdateLinkCommand;
use Application\Shared\Mapper;
use Domain\Link\Repository\LinkRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class UpdateLinkHandler.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[AsMessageHandler]
final class UpdateLinkHandler
{
    public function __construct(
        private readonly LinkRepositoryInterface $repository
    ) {
    }

    public function __invoke(UpdateLinkCommand $command): void
    {
        $this->repository->save(Mapper::getHydratedObject($command, $command->_entity));
    }
}
