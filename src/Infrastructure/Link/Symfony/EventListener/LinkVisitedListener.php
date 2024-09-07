<?php

declare(strict_types=1);

namespace Infrastructure\Link\Symfony\EventListener;

use Application\Link\Command\CreateLinkVisitCommand;
use Domain\Link\Event\LinkVisitedEvent;
use Domain\Link\Repository\LinkRepositoryInterface;
use Infrastructure\Shared\Symfony\Messenger\CommandBusAwareDispatchTrait;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

/**
 * Class LinkVisitedListener.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
#[AsEventListener(LinkVisitedEvent::class)]
final class LinkVisitedListener
{
    use CommandBusAwareDispatchTrait;

    /**
     * @param MessageBusInterface $bus
     */
    public function __construct(
        private readonly MessageBusInterface $bus,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function __invoke(LinkVisitedEvent $event): void
    {
        $this->dispatchSync(new CreateLinkVisitCommand(
            link: $event->link,
            ip: (string) $event->ip,
            user_agent: $event->user_agent,
            server: $event->server
        ));
    }
}
