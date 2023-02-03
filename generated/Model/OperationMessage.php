<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class OperationMessage
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The human-readable message that describes the result.
     *
     * @var string
     */
    protected $message;
    /**
     * The status code of the response.
     *
     * @var int
     */
    protected $statusCode;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The human-readable message that describes the result.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * The human-readable message that describes the result.
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    /**
     * The status code of the response.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * The status code of the response.
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->initialized['statusCode'] = true;
        $this->statusCode = $statusCode;

        return $this;
    }
}
