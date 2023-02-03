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

class NestedResponse
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int
     */
    protected $status;
    /**
     * Error messages from an operation.
     *
     * @var ErrorCollection
     */
    protected $errorCollection;
    /**
     * @var WarningCollection
     */
    protected $warningCollection;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Error messages from an operation.
     */
    public function getErrorCollection(): ErrorCollection
    {
        return $this->errorCollection;
    }

    /**
     * Error messages from an operation.
     */
    public function setErrorCollection(ErrorCollection $errorCollection): self
    {
        $this->initialized['errorCollection'] = true;
        $this->errorCollection = $errorCollection;

        return $this;
    }

    public function getWarningCollection(): WarningCollection
    {
        return $this->warningCollection;
    }

    public function setWarningCollection(WarningCollection $warningCollection): self
    {
        $this->initialized['warningCollection'] = true;
        $this->warningCollection = $warningCollection;

        return $this;
    }
}
