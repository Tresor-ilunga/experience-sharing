<?php

declare(strict_types=1);

namespace Application\Shared;

use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class Mapper.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class Mapper
{
    public static function hydrate(object $source, object $destination, array $ignore = []): void
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->getPropertyAccessor();
        $sourceReflection = new \ReflectionClass($source);
        $destinationReflection = new \ReflectionClass($destination);

        foreach ($sourceReflection->getProperties() as $property) {
            $propertyName = $property->getName();
            if ($destinationReflection->hasProperty($propertyName) && ! in_array($propertyName, $ignore, true)) {
                $propertyAccessor->setValue($destination, $propertyName, $property->getValue($source));
            }
        }
    }

    public static function toArray(object $source, array $ignore = []): array
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->getPropertyAccessor();
        $sourceReflection = new \ReflectionClass($source);

        $data = [];
        foreach ($sourceReflection->getProperties() as $property) {
            $propertyName = $property->getName();
            if (! in_array($propertyName, $ignore, true)) {
                $data[$propertyName] = $property->getValue($source);
            }
        }

        return $data;
    }

    public static function fromArray(array $source, object $destination, array $ignore = []): void
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->getPropertyAccessor();
        $destinationReflection = new \ReflectionClass($destination);

        foreach ($source as $property => $value) {
            if ($destinationReflection->hasProperty($property) && ! in_array($property, $ignore, true)) {
                $propertyAccessor->setValue($destination, $property, $value);
            }
        }
    }

    public static function getHydratedObject(object $source, object $destination, array $ignore = []): object
    {
        self::hydrate($source, $destination, $ignore);

        return $destination;
    }

    public static function hasProperties(object $source, array $properties): bool
    {
        foreach ($properties as $property) {
            if (! property_exists($source, $property)) {
                return false;
            }
        }

        return true;
    }
}