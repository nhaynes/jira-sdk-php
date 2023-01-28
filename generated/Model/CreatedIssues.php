<?php

namespace JiraSdk\Model;

class CreatedIssues
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
     * Details of the issues created.
     *
     * @var CreatedIssue[]
     */
    protected $issues;
    /**
     * Error details for failed issue creation requests.
     *
     * @var BulkOperationErrorResult[]
     */
    protected $errors;
    /**
     * Details of the issues created.
     *
     * @return CreatedIssue[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }
    /**
     * Details of the issues created.
     *
     * @param CreatedIssue[] $issues
     *
     * @return self
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;
        return $this;
    }
    /**
     * Error details for failed issue creation requests.
     *
     * @return BulkOperationErrorResult[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * Error details for failed issue creation requests.
     *
     * @param BulkOperationErrorResult[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}
