<?php

namespace JiraSdk\Model;

class BulkOperationErrorResult
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     *
     *
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
     *
     *
     * @var int
     */
    protected $failedElementNumber;
    /**
     *
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
    /**
     *
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Error messages from an operation.
     *
     * @return ErrorCollection
     */
    public function getElementErrors(): ErrorCollection
    {
        return $this->elementErrors;
    }
    /**
     * Error messages from an operation.
     *
     * @param ErrorCollection $elementErrors
     *
     * @return self
     */
    public function setElementErrors(ErrorCollection $elementErrors): self
    {
        $this->initialized['elementErrors'] = true;
        $this->elementErrors = $elementErrors;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getFailedElementNumber(): int
    {
        return $this->failedElementNumber;
    }
    /**
     *
     *
     * @param int $failedElementNumber
     *
     * @return self
     */
    public function setFailedElementNumber(int $failedElementNumber): self
    {
        $this->initialized['failedElementNumber'] = true;
        $this->failedElementNumber = $failedElementNumber;
        return $this;
    }
}
