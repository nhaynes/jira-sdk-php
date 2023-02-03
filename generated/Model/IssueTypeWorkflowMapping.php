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

class IssueTypeWorkflowMapping
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type. Not required if updating the issue type-workflow mapping.
     *
     * @var string
     */
    protected $issueType;
    /**
     * The name of the workflow.
     *
     * @var string
     */
    protected $workflow;
    /**
     * Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping.
     *
     * @var bool
     */
    protected $updateDraftIfNeeded;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type. Not required if updating the issue type-workflow mapping.
     */
    public function getIssueType(): string
    {
        return $this->issueType;
    }

    /**
     * The ID of the issue type. Not required if updating the issue type-workflow mapping.
     */
    public function setIssueType(string $issueType): self
    {
        $this->initialized['issueType'] = true;
        $this->issueType = $issueType;

        return $this;
    }

    /**
     * The name of the workflow.
     */
    public function getWorkflow(): string
    {
        return $this->workflow;
    }

    /**
     * The name of the workflow.
     */
    public function setWorkflow(string $workflow): self
    {
        $this->initialized['workflow'] = true;
        $this->workflow = $workflow;

        return $this;
    }

    /**
     * Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping.
     */
    public function getUpdateDraftIfNeeded(): bool
    {
        return $this->updateDraftIfNeeded;
    }

    /**
     * Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping.
     */
    public function setUpdateDraftIfNeeded(bool $updateDraftIfNeeded): self
    {
        $this->initialized['updateDraftIfNeeded'] = true;
        $this->updateDraftIfNeeded = $updateDraftIfNeeded;

        return $this;
    }
}
