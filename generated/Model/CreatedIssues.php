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

class CreatedIssues
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }
}
