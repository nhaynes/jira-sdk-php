<?php

namespace JiraSdk\Model;

class CreateWorkflowTransitionDetails
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
    /**
     * The name of the transition. The maximum length is 60 characters.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the transition. The maximum length is 60 characters.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the transition. The maximum length is 1000 characters.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the transition. The maximum length is 1000 characters.
     *
     * @param string $description
     *
     * @return self
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
     *
     * @return self
     */
    public function setFrom(array $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * The status the transition goes to.
     *
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }
    /**
     * The status the transition goes to.
     *
     * @param string $to
     *
     * @return self
     */
    public function setTo(string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The type of the transition.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the transition.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The rules of the transition.
     *
     * @return CreateWorkflowTransitionDetailsRules
     */
    public function getRules(): CreateWorkflowTransitionDetailsRules
    {
        return $this->rules;
    }
    /**
     * The rules of the transition.
     *
     * @param CreateWorkflowTransitionDetailsRules $rules
     *
     * @return self
     */
    public function setRules(CreateWorkflowTransitionDetailsRules $rules): self
    {
        $this->initialized['rules'] = true;
        $this->rules = $rules;
        return $this;
    }
    /**
     * The screen of the transition.
     *
     * @return CreateWorkflowTransitionDetailsScreen
     */
    public function getScreen(): CreateWorkflowTransitionDetailsScreen
    {
        return $this->screen;
    }
    /**
     * The screen of the transition.
     *
     * @param CreateWorkflowTransitionDetailsScreen $screen
     *
     * @return self
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
     *
     * @return self
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
}
