<?php

declare(strict_types=1);

namespace Domain\Shared\Exception;

use Throwable;

/**
 * Class SafeMessageException
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class SafeMessageException extends \DomainException
{
    protected string $messageKey = '';
    protected string $messageDomain = 'messages';
    protected array $messageData = [];

    /**
     * @param string $message
     * @param array $messageData
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', array $messageData = [], int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->setSafeMessage($message, $messageData);
    }

    /**
     * Set a message that will be shown to the user.
     *
     * @param string $messageKey  The message or message key
     * @param array  $messageData Data to be passed into the translator
     */
    public function setSafeMessage(string $messageKey, array $messageData = []): void
    {
        $this->messageKey = $messageKey;
        $this->messageData = $messageData;
    }

    /**
     * @return string
     */
    public function getMessageKey(): string
    {
        return $this->messageKey;
    }

    /**
     * @return array Data to be passed into the translator
     */
    public function getMessageData(): array
    {
        return $this->messageData;
    }

    /**
     * @return string The message domain for translation
     */
    public function getMessageDomain(): string
    {
        return $this->messageDomain;
    }
}