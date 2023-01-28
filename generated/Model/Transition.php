<?php

namespace JiraSdk\Model;

class Transition
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
     * The ID of the transition.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the transition.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the transition.
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
     * The details of a transition screen.
     *
     * @var TransitionScreenDetails
     */
    protected $screen;
    /**
     * A collection of transition rules.
     *
     * @var WorkflowRules
     */
    protected $rules;
    /**
     * The properties of the transition.
     *
     * @var mixed[]
     */
    protected $properties;
    /**
     * The ID of the transition.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the transition.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The name of the transition.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the transition.
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
     * The description of the transition.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the transition.
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
     * The details of a transition screen.
     *
     * @return TransitionScreenDetails
     */
    public function getScreen(): TransitionScreenDetails
    {
        return $this->screen;
    }
    /**
     * The details of a transition screen.
     *
     * @param TransitionScreenDetails $screen
     *
     * @return self
     */
    public function setScreen(TransitionScreenDetails $screen): self
    {
        $this->initialized['screen'] = true;
        $this->screen = $screen;
        return $this;
    }
    /**
     * A collection of transition rules.
     *
     * @return WorkflowRules
     */
    public function getRules(): WorkflowRules
    {
        return $this->rules;
    }
    /**
     * A collection of transition rules.
     *
     * @param WorkflowRules $rules
     *
     * @return self
     */
    public function setRules(WorkflowRules $rules): self
    {
        $this->initialized['rules'] = true;
        $this->rules = $rules;
        return $this;
    }
    /**
     * The properties of the transition.
     *
     * @return mixed[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }
    /**
     * The properties of the transition.
     *
     * @param mixed[] $properties
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
