<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Doctrine\Subscriber;

use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

/**
 * Class TimestampSubscriber
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class TimestampSubscriber implements EventSubscriberInterface
{
    /**
     * @return array|string[]
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::postUpdate
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     * @return void
     */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $object = $args->getObject();
        if (method_exists($object, 'setCreatedAt')) {
            $object->setCreatedAt(new \DateTimeImmutable());
        }
    }

    /**
     * @param LifecycleEventArgs $args
     * @return void
     */
    public function postUpdate(LifecycleEventArgs $args): void
    {
        $object = $args->getObject();
        if (method_exists($object, 'setUpdatedAt')) {
            $object->setUpdatedAt(new \DateTimeImmutable());
        }
    }
}