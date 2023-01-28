<?php

namespace JiraSdk\Model;

class WorkflowId
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
     * The name of the workflow.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether the workflow is in the draft state.
     *
     * @var bool
     */
    protected $draft;
    /**
     * The name of the workflow.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the workflow.
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
     * Whether the workflow is in the draft state.
     *
     * @return bool
     */
    public function getDraft(): bool
    {
        return $this->draft;
    }
    /**
     * Whether the workflow is in the draft state.
     *
     * @param bool $draft
     *
     * @return self
     */
    public function setDraft(bool $draft): self
    {
        $this->initialized['draft'] = true;
        $this->draft = $draft;
        return $this;
    }
}
