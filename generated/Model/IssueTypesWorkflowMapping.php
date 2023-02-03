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

class IssueTypesWorkflowMapping
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the workflow. Optional if updating the workflow-issue types mapping.
     *
     * @var string
     */
    protected $workflow;
    /**
     * The list of issue type IDs.
     *
     * @var string[]
     */
    protected $issueTypes;
    /**
     * Whether the workflow is the default workflow for the workflow scheme.
     *
     * @var bool
     */
    protected $defaultMapping;
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`.
     *
     * @var bool
     */
    protected $updateDraftIfNeeded;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the workflow. Optional if updating the workflow-issue types mapping.
     */
    public function getWorkflow(): string
    {
        return $this->workflow;
    }

    /**
     * The name of the workflow. Optional if updating the workflow-issue types mapping.
     */
    public function setWorkflow(string $workflow): self
    {
        $this->initialized['workflow'] = true;
        $this->workflow = $workflow;

        return $this;
    }

    /**
     * The list of issue type IDs.
     *
     * @return string[]
     */
    public function getIssueTypes(): array
    {
        return $this->issueTypes;
    }

    /**
     * The list of issue type IDs.
     *
     * @param string[] $issueTypes
     */
    public function setIssueTypes(array $issueTypes): self
    {
        $this->initialized['issueTypes'] = true;
        $this->issueTypes = $issueTypes;

        return $this;
    }

    /**
     * Whether the workflow is the default workflow for the workflow scheme.
     */
    public function getDefaultMapping(): bool
    {
        return $this->defaultMapping;
    }

    /**
     * Whether the workflow is the default workflow for the workflow scheme.
     */
    public function setDefaultMapping(bool $defaultMapping): self
    {
        $this->initialized['defaultMapping'] = true;
        $this->defaultMapping = $defaultMapping;

        return $this;
    }

    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`.
     */
    public function getUpdateDraftIfNeeded(): bool
    {
        return $this->updateDraftIfNeeded;
    }

    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`.
     */
    public function setUpdateDraftIfNeeded(bool $updateDraftIfNeeded): self
    {
        $this->initialized['updateDraftIfNeeded'] = true;
        $this->updateDraftIfNeeded = $updateDraftIfNeeded;

        return $this;
    }
}
