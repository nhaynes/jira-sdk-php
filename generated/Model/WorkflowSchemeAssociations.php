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

class WorkflowSchemeAssociations
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of projects that use the workflow scheme.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * The workflow scheme.
     *
     * @var WorkflowSchemeAssociationsWorkflowScheme
     */
    protected $workflowScheme;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of projects that use the workflow scheme.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }

    /**
     * The list of projects that use the workflow scheme.
     *
     * @param string[] $projectIds
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;

        return $this;
    }

    /**
     * The workflow scheme.
     */
    public function getWorkflowScheme(): WorkflowSchemeAssociationsWorkflowScheme
    {
        return $this->workflowScheme;
    }

    /**
     * The workflow scheme.
     */
    public function setWorkflowScheme(WorkflowSchemeAssociationsWorkflowScheme $workflowScheme): self
    {
        $this->initialized['workflowScheme'] = true;
        $this->workflowScheme = $workflowScheme;

        return $this;
    }
}
