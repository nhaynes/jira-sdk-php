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

class WorkflowRulesSearchDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The workflow ID.
     *
     * @var string
     */
    protected $workflowEntityId;
    /**
     * List of workflow rule IDs that do not belong to the workflow or can not be found.
     *
     * @var string[]
     */
    protected $invalidRules;
    /**
     * List of valid workflow transition rules.
     *
     * @var WorkflowTransitionRules[]
     */
    protected $validRules;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The workflow ID.
     */
    public function getWorkflowEntityId(): string
    {
        return $this->workflowEntityId;
    }

    /**
     * The workflow ID.
     */
    public function setWorkflowEntityId(string $workflowEntityId): self
    {
        $this->initialized['workflowEntityId'] = true;
        $this->workflowEntityId = $workflowEntityId;

        return $this;
    }

    /**
     * List of workflow rule IDs that do not belong to the workflow or can not be found.
     *
     * @return string[]
     */
    public function getInvalidRules(): array
    {
        return $this->invalidRules;
    }

    /**
     * List of workflow rule IDs that do not belong to the workflow or can not be found.
     *
     * @param string[] $invalidRules
     */
    public function setInvalidRules(array $invalidRules): self
    {
        $this->initialized['invalidRules'] = true;
        $this->invalidRules = $invalidRules;

        return $this;
    }

    /**
     * List of valid workflow transition rules.
     *
     * @return WorkflowTransitionRules[]
     */
    public function getValidRules(): array
    {
        return $this->validRules;
    }

    /**
     * List of valid workflow transition rules.
     *
     * @param WorkflowTransitionRules[] $validRules
     */
    public function setValidRules(array $validRules): self
    {
        $this->initialized['validRules'] = true;
        $this->validRules = $validRules;

        return $this;
    }
}
