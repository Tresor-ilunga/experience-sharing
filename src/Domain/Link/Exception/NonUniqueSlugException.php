<?php

declare(strict_types=1);

namespace Domain\Link\Exception;

use Domain\Shared\Exception\SafeMessageException;
use Throwable;

/**
 * Class NonUniqueSlugException.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class NonUniqueSlugException extends SafeMessageException
{
    /**
     * @var string $messageDomain
     */
    protected string $messageDomain = 'link';

    /**
     * @param string $message
     * @param array $messageData
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = 'link.exceptions.non_unique_slug',
        array $messageData = [],
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $messageData, $code, $previous);
    }
}
