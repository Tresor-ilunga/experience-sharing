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
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
#[AsMessageHandler]
final readonly class UpdateLinkHandler
{
    /**
     * @param LinkRepositoryInterface $repository
     */
    public function __construct(
        private LinkRepositoryInterface $repository
    ) {
    }

    /**
     * This method is called when the message is handled.
     *
     * @param UpdateLinkCommand $command
     * @return void
     */
    public function __invoke(UpdateLinkCommand $command): void
    {
        $this->repository->save(Mapper::getHydratedObject($command, $command->_entity));
    }
}
