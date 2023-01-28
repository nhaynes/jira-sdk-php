<?php

namespace JiraSdk\Model;

class CreatedIssueTransition extends \ArrayObject
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
    protected $errorCollection;
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
    public function getErrorCollection(): ErrorCollection
    {
        return $this->errorCollection;
    }
    /**
     * Error messages from an operation.
     *
     * @param ErrorCollection $errorCollection
     *
     * @return self
     */
    public function setErrorCollection(ErrorCollection $errorCollection): self
    {
        $this->initialized['errorCollection'] = true;
        $this->errorCollection = $errorCollection;
        return $this;
    }
}
