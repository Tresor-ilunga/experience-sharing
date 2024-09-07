<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Doctrine\Subscriber;

use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

/**
 * Class TimestampSubscriber
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final class TimestampSubscriber implements EventSubscriberInterface
{
    /**
     * This method returns an array of events this subscriber wants to listen to.
     *
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
     * This method is called before an entity is persisted.
     *
     * @param LifecycleEventArgs $args
     * @return void
     */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $object = $args->getObject();
        if (method_exists($object, 'setCreatedAt')) {
            $object->setCreatedAt(new DateTimeImmutable());
        }
    }

    /**
     * This method is called before an entity is updated.
     *
     * @param LifecycleEventArgs $args
     * @return void
     */
    public function postUpdate(LifecycleEventArgs $args): void
    {
        $object = $args->getObject();
        if (method_exists($object, 'setUpdatedAt')) {
            $object->setUpdatedAt(new DateTimeImmutable());
        }
    }
}