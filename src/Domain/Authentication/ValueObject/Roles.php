<?php

declare(strict_types=1);

namespace Domain\Authentication\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Role.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class Roles implements \Stringable
{
    /**
     * This is the list of roles that can be used to create a new user.
     */
    public const ROLES = ['ROLE_ADMIN', 'ROLE_USER'];

    /**
     * This is the list of roles that can be used to create a new user.
     */
    public const ROLES_CHOICES = [
        'ROLE_ADMIN' => 'ROLE_ADMIN',
        'ROLE_USER' => 'ROLE_USER',
    ];

    private readonly array $roles;

    /**
     * @param array $roles
     */
    private function __construct(array $roles = ['ROLE_USER'])
    {
        Assert::notEmpty($roles, 'authentication.validations.empty_roles');
        foreach ($roles as $role) {
            Assert::inArray($role, self::ROLES, 'authentication.validations.invalid_roles');
        }

        $roles[] = 'ROLE_USER';
        $this->roles = array_unique($roles);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode(',', $this->roles);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return static
     */
    public static function fromArray(array $roles): self
    {
        return new self($roles);
    }

    /**
     * @return static
     */
    public static function admin(): self
    {
        return new self(['ROLE_ADMIN']);
    }

    /**
     * @return static
     */
    public static function user(): self
    {
        return new self(['ROLE_USER']);
    }

    /**
     * @param array|Roles $roles
     * @return bool
     */
    public function equals(array|self $roles): bool
    {
        if ($roles instanceof self) {
            return $roles->roles === $this->roles;
        }

        return $roles === $this->roles;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function contains(string $role): bool
    {
        return in_array($role, $this->roles, true);
    }
}