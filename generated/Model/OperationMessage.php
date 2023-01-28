<?php

namespace JiraSdk\Model;

class OperationMessage
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
    /**
     * The human-readable message that describes the result.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /**
     * The human-readable message that describes the result.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * The status code of the response.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
    /**
     * The status code of the response.
     *
     * @param int $statusCode
     *
     * @return self
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->initialized['statusCode'] = true;
        $this->statusCode = $statusCode;
        return $this;
    }
}
