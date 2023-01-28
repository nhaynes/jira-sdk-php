<?php

namespace JiraSdk\Model;

class ProjectFeatureState
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
     * The feature state.
     *
     * @var string
     */
    protected $state;
    /**
     * The feature state.
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }
    /**
     * The feature state.
     *
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
}
