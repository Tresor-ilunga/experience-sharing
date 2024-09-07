<?php

declare(strict_types=1);

namespace Application\Link\Handler;

use Application\Link\Command\CreateLinkVisitCommand;
use Application\Link\Service\DeviceDetectorServiceInterface;
use Application\Link\Service\IpAddressLocatorServiceInterface;
use Domain\Link\Entity\LinkVisit;
use Domain\Link\Repository\LinkRepositoryInterface;
use Domain\Link\Repository\LinkVisitRepositoryInterface;
use Infrastructure\Link\Doctrine\Repository\LinkRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * class CreateLinkVisitHandler.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
#[AsMessageHandler]
final readonly class CreateLinkVisitHandler
{
    /**
     * This method is called when the message is handled.
     *
     * @param LinkVisitRepositoryInterface $repository
     * @param LinkRepositoryInterface $linkRepository
     * @param IpAddressLocatorServiceInterface $ipAddressLocatorService
     * @param DeviceDetectorServiceInterface $detectorService
     */
    public function __construct(
        private LinkVisitRepositoryInterface     $repository,
        private LinkRepositoryInterface          $linkRepository,
        private IpAddressLocatorServiceInterface $ipAddressLocatorService,
        private DeviceDetectorServiceInterface   $detectorService
    ) {
    }

    /**
     * This method is called when the message is handled.
     *
     * @param CreateLinkVisitCommand $command
     * @return void
     */
    public function __invoke(CreateLinkVisitCommand $command): void
    {
        $command->link->setTotalVisitCount(
            $command->link->getTotalVisitCount() + 1
        );

        if ($this->repository->hasAlreadyBeenVisited((string) $command->ip, $command->link)) {
            $visit = (new LinkVisit())
                ->setLink($command->link)
                ->setDevice($this->detectorService->getDevice($command->user_agent, $command->server))
                ->setLocation($this->ipAddressLocatorService->getLocation($command->ip))
            ;
            $command->link->setUniqueVisitCount(
                $command->link->getUniqueVisitCount() + 1
            );

            $this->repository->save($visit);
        }

        $this->linkRepository->save($command->link);
    }
}
