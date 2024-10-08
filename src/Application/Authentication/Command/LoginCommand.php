<?php

declare(strict_types=1);

namespace Application\Authentication\Command;

/**
 * Class LoginCommand.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final class LoginCommand
{
    /**
     * This is the identifier of the user.
     *
     * @param string|null $identifier
     * @param string|null $password
     */
    public function __construct(
        public ?string $identifier = null,
        public ?string $password = null
    ) {
    }
}
