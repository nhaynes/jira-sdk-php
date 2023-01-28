<?php

namespace JiraSdk\Model;

class IssueFieldOptionConfiguration
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
     * Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects.
     *
     * @var IssueFieldOptionConfigurationScope
     */
    protected $scope;
    /**
     * DEPRECATED
     *
     * @var string[]
     */
    protected $attributes;
    /**
     * Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects.
     *
     * @return IssueFieldOptionConfigurationScope
     */
    public function getScope(): IssueFieldOptionConfigurationScope
    {
        return $this->scope;
    }
    /**
     * Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects.
     *
     * @param IssueFieldOptionConfigurationScope $scope
     *
     * @return self
     */
    public function setScope(IssueFieldOptionConfigurationScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * DEPRECATED
     *
     * @return string[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    /**
     * DEPRECATED
     *
     * @param string[] $attributes
     *
     * @return self
     */
    public function setAttributes(array $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;
        return $this;
    }
}
