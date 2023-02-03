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

class CreateWorkflowTransitionDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the transition. The maximum length is 60 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the transition. The maximum length is 1000 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The statuses the transition can start from.
     *
     * @var string[]
     */
    protected $from;
    /**
     * The status the transition goes to.
     *
     * @var string
     */
    protected $to;
    /**
     * The type of the transition.
     *
     * @var string
     */
    protected $type;
    /**
     * The rules of the transition.
     *
     * @var CreateWorkflowTransitionDetailsRules
     */
    protected $rules;
    /**
     * The screen of the transition.
     *
     * @var CreateWorkflowTransitionDetailsScreen
     */
    protected $screen;
    /**
     * The properties of the transition.
     *
     * @var string[]
     */
    protected $properties;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the transition. The maximum length is 60 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the transition. The maximum length is 60 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the transition. The maximum length is 1000 characters.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the transition. The maximum length is 1000 characters.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The statuses the transition can start from.
     *
     * @return string[]
     */
    public function getFrom(): array
    {
        return $this->from;
    }

    /**
     * The statuses the transition can start from.
     *
     * @param string[] $from
     */
    public function setFrom(array $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;

        return $this;
    }

    /**
     * The status the transition goes to.
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * The status the transition goes to.
     */
    public function setTo(string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;

        return $this;
    }

    /**
     * The type of the transition.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the transition.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The rules of the transition.
     */
    public function getRules(): CreateWorkflowTransitionDetailsRules
    {
        return $this->rules;
    }

    /**
     * The rules of the transition.
     */
    public function setRules(CreateWorkflowTransitionDetailsRules $rules): self
    {
        $this->initialized['rules'] = true;
        $this->rules = $rules;

        return $this;
    }

    /**
     * The screen of the transition.
     */
    public function getScreen(): CreateWorkflowTransitionDetailsScreen
    {
        return $this->screen;
    }

    /**
     * The screen of the transition.
     */
    public function setScreen(CreateWorkflowTransitionDetailsScreen $screen): self
    {
        $this->initialized['screen'] = true;
        $this->screen = $screen;

        return $this;
    }

    /**
     * The properties of the transition.
     *
     * @return string[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * The properties of the transition.
     *
     * @param string[] $properties
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }
}
