<?php

namespace JiraSdk\Model;

class ContainerForProjectFeatures
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
     * The project features.
     *
     * @var ProjectFeature[]
     */
    protected $features;
    /**
     * The project features.
     *
     * @return ProjectFeature[]
     */
    public function getFeatures(): array
    {
        return $this->features;
    }
    /**
     * The project features.
     *
     * @param ProjectFeature[] $features
     *
     * @return self
     */
    public function setFeatures(array $features): self
    {
        $this->initialized['features'] = true;
        $this->features = $features;
        return $this;
    }
}
