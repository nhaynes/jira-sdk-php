<?php

namespace JiraSdk\Model;

class RemoveOptionFromIssuesResultErrors extends \ArrayObject
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
     * The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters."
     *
     * @var string[]
     */
    protected $errors;
    /**
     * The list of error messages produced by this operation. For example, "input parameter 'key' must be provided"
     *
     * @var string[]
     */
    protected $errorMessages;
    /**
     *
     *
     * @var int
     */
    protected $httpStatusCode;
    /**
     * The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters."
     *
     * @return string[]
     */
    public function getErrors(): iterable
    {
        return $this->errors;
    }
    /**
     * The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters."
     *
     * @param string[] $errors
     *
     * @return self
     */
    public function setErrors(iterable $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
    /**
     * The list of error messages produced by this operation. For example, "input parameter 'key' must be provided"
     *
     * @return string[]
     */
    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }
    /**
     * The list of error messages produced by this operation. For example, "input parameter 'key' must be provided"
     *
     * @param string[] $errorMessages
     *
     * @return self
     */
    public function setErrorMessages(array $errorMessages): self
    {
        $this->initialized['errorMessages'] = true;
        $this->errorMessages = $errorMessages;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
    /**
     *
     *
     * @param int $httpStatusCode
     *
     * @return self
     */
    public function setHttpStatusCode(int $httpStatusCode): self
    {
        $this->initialized['httpStatusCode'] = true;
        $this->httpStatusCode = $httpStatusCode;
        return $this;
    }
}
