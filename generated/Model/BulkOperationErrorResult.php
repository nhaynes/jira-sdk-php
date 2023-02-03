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

class BulkOperationErrorResult
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
    protected $elementErrors;
    /**
     * @var int
     */
    protected $failedElementNumber;

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
    public function getElementErrors(): ErrorCollection
    {
        return $this->elementErrors;
    }

    /**
     * Error messages from an operation.
     */
    public function setElementErrors(ErrorCollection $elementErrors): self
    {
        $this->initialized['elementErrors'] = true;
        $this->elementErrors = $elementErrors;

        return $this;
    }

    public function getFailedElementNumber(): int
    {
        return $this->failedElementNumber;
    }

    public function setFailedElementNumber(int $failedElementNumber): self
    {
        $this->initialized['failedElementNumber'] = true;
        $this->failedElementNumber = $failedElementNumber;

        return $this;
    }
}
