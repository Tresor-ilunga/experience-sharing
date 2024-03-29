<?php

declare(strict_types=1);

namespace Application\Link\Handler;

use Application\Link\Command\DeleteLinkCommand;
use Domain\Link\Repository\LinkRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class DeleteLinkHandler.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[AsMessageHandler]
final class DeleteLinkHandler
{
    /**
     * @param LinkRepositoryInterface $repository
     */
    public function __construct(
        private readonly LinkRepositoryInterface $repository
    ) {
    }

    /**
     * This method is called when the message is handled.
     *
     * @param DeleteLinkCommand $command
     * @return void
     */
    public function __invoke(DeleteLinkCommand $command): void
    {
        $this->repository->delete($command->_entity);
    }
}
