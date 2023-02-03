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

class SimpleErrorCollection
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters.".
     *
     * @var string[]
     */
    protected $errors;
    /**
     * The list of error messages produced by this operation. For example, "input parameter 'key' must be provided".
     *
     * @var string[]
     */
    protected $errorMessages;
    /**
     * @var int
     */
    protected $httpStatusCode;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters.".
     *
     * @return string[]
     */
    public function getErrors(): iterable
    {
        return $this->errors;
    }

    /**
     * The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters.".
     *
     * @param string[] $errors
     */
    public function setErrors(iterable $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }

    /**
     * The list of error messages produced by this operation. For example, "input parameter 'key' must be provided".
     *
     * @return string[]
     */
    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }

    /**
     * The list of error messages produced by this operation. For example, "input parameter 'key' must be provided".
     *
     * @param string[] $errorMessages
     */
    public function setErrorMessages(array $errorMessages): self
    {
        $this->initialized['errorMessages'] = true;
        $this->errorMessages = $errorMessages;

        return $this;
    }

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function setHttpStatusCode(int $httpStatusCode): self
    {
        $this->initialized['httpStatusCode'] = true;
        $this->httpStatusCode = $httpStatusCode;

        return $this;
    }
}
