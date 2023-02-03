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

class CreateWorkflowDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the workflow. The name must be unique. The maximum length is 255 characters. Characters can be separated by a whitespace but the name cannot start or end with a whitespace.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the workflow. The maximum length is 1000 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The transitions of the workflow. For the request to be valid, these transitions must:.
     *
     *  include one *initial* transition.
     *  not use the same name for a *global* and *directed* transition.
     *  have a unique name for each *global* transition.
     *  have a unique 'to' status for each *global* transition.
     *  have unique names for each transition from a status.
     *  not have a 'from' status on *initial* and *global* transitions.
     *  have a 'from' status on *directed* transitions.
     *
     * All the transition statuses must be included in `statuses`.
     *
     * @var CreateWorkflowTransitionDetails[]
     */
    protected $transitions;
    /**
     * The statuses of the workflow. Any status that does not include a transition is added to the workflow without a transition.
     *
     * @var CreateWorkflowStatusDetails[]
     */
    protected $statuses;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the workflow. The name must be unique. The maximum length is 255 characters. Characters can be separated by a whitespace but the name cannot start or end with a whitespace.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the workflow. The name must be unique. The maximum length is 255 characters. Characters can be separated by a whitespace but the name cannot start or end with a whitespace.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the workflow. The maximum length is 1000 characters.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the workflow. The maximum length is 1000 characters.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The transitions of the workflow. For the request to be valid, these transitions must:.
     *
     *  include one *initial* transition.
     *  not use the same name for a *global* and *directed* transition.
     *  have a unique name for each *global* transition.
     *  have a unique 'to' status for each *global* transition.
     *  have unique names for each transition from a status.
     *  not have a 'from' status on *initial* and *global* transitions.
     *  have a 'from' status on *directed* transitions.
     *
     * All the transition statuses must be included in `statuses`.
     *
     * @return CreateWorkflowTransitionDetails[]
     */
    public function getTransitions(): array
    {
        return $this->transitions;
    }

    /**
     * The transitions of the workflow. For the request to be valid, these transitions must:.
     *
     *  include one *initial* transition.
     *  not use the same name for a *global* and *directed* transition.
     *  have a unique name for each *global* transition.
     *  have a unique 'to' status for each *global* transition.
     *  have unique names for each transition from a status.
     *  not have a 'from' status on *initial* and *global* transitions.
     *  have a 'from' status on *directed* transitions.
     *
     * All the transition statuses must be included in `statuses`.
     *
     * @param CreateWorkflowTransitionDetails[] $transitions
     */
    public function setTransitions(array $transitions): self
    {
        $this->initialized['transitions'] = true;
        $this->transitions = $transitions;

        return $this;
    }

    /**
     * The statuses of the workflow. Any status that does not include a transition is added to the workflow without a transition.
     *
     * @return CreateWorkflowStatusDetails[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * The statuses of the workflow. Any status that does not include a transition is added to the workflow without a transition.
     *
     * @param CreateWorkflowStatusDetails[] $statuses
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;

        return $this;
    }
}
