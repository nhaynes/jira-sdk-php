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

class WorkflowsWithTransitionRulesDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of workflows with transition rules to delete.
     *
     * @var WorkflowTransitionRulesDetails[]
     */
    protected $workflows;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of workflows with transition rules to delete.
     *
     * @return WorkflowTransitionRulesDetails[]
     */
    public function getWorkflows(): array
    {
        return $this->workflows;
    }

    /**
     * The list of workflows with transition rules to delete.
     *
     * @param WorkflowTransitionRulesDetails[] $workflows
     */
    public function setWorkflows(array $workflows): self
    {
        $this->initialized['workflows'] = true;
        $this->workflows = $workflows;

        return $this;
    }
}
