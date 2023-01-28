<?php

namespace JiraSdk\Model;

class Transitions
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
     * Expand options that include additional transitions details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * List of issue transitions.
     *
     * @var IssueTransition[]
     */
    protected $transitions;
    /**
     * Expand options that include additional transitions details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional transitions details in the response.
     *
     * @param string $expand
     *
     * @return self
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
    /**
     * List of issue transitions.
     *
     * @return IssueTransition[]
     */
    public function getTransitions(): array
    {
        return $this->transitions;
    }
    /**
     * List of issue transitions.
     *
     * @param IssueTransition[] $transitions
     *
     * @return self
     */
    public function setTransitions(array $transitions): self
    {
        $this->initialized['transitions'] = true;
        $this->transitions = $transitions;
        return $this;
    }
}
