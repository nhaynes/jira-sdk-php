<?php

namespace JiraSdk\Model;

class DeprecatedWorkflowScope extends \ArrayObject
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
     * The type of scope.
     *
     * @var string
     */
    protected $type;
    /**
     * The project the item has scope in.
     *
     * @var ScopeProject
     */
    protected $project;
    /**
     * The type of scope.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of scope.
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
     * The project the item has scope in.
     *
     * @return ScopeProject
     */
    public function getProject(): ScopeProject
    {
        return $this->project;
    }
    /**
     * The project the item has scope in.
     *
     * @param ScopeProject $project
     *
     * @return self
     */
    public function setProject(ScopeProject $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;
        return $this;
    }
}
