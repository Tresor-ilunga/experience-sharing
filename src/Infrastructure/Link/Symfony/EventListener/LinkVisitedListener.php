<?php

declare(strict_types=1);

namespace Infrastructure\Link\Symfony\EventListener;

use Application\Link\Command\CreateLinkVisitCommand;
use Domain\Link\Event\LinkVisitedEvent;
use Domain\Link\Repository\LinkRepositoryInterface;
use Infrastructure\Shared\Symfony\Messenger\CommandBusAwareDispatchTrait;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class LinkVisitedListener.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[AsEventListener(LinkVisitedEvent::class)]
final class LinkVisitedListener
{
    use CommandBusAwareDispatchTrait;

    public function __construct(
        private readonly MessageBusInterface $bus,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function __invoke(LinkVisitedEvent $event)
    {
        $this->dispatchSync(new CreateLinkVisitCommand(
            link: $event->link,
            ip: (string) $event->ip,
            user_agent: $event->user_agent,
            server: $event->server
        ));
    }
}
