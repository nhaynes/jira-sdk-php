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

class WorkflowTransitionRulesUpdateErrors
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of workflows.
     *
     * @var WorkflowTransitionRulesUpdateErrorDetails[]
     */
    protected $updateResults;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of workflows.
     *
     * @return WorkflowTransitionRulesUpdateErrorDetails[]
     */
    public function getUpdateResults(): array
    {
        return $this->updateResults;
    }

    /**
     * A list of workflows.
     *
     * @param WorkflowTransitionRulesUpdateErrorDetails[] $updateResults
     */
    public function setUpdateResults(array $updateResults): self
    {
        $this->initialized['updateResults'] = true;
        $this->updateResults = $updateResults;

        return $this;
    }
}
