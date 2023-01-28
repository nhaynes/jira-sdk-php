<?php

namespace JiraSdk\Model;

class HealthCheckResult
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
     * The name of the Jira health check item.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the Jira health check item.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the Jira health check item passed or failed.
     *
     * @var bool
     */
    protected $passed;
    /**
     * The name of the Jira health check item.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the Jira health check item.
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
     * The description of the Jira health check item.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the Jira health check item.
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
     * Whether the Jira health check item passed or failed.
     *
     * @return bool
     */
    public function getPassed(): bool
    {
        return $this->passed;
    }
    /**
     * Whether the Jira health check item passed or failed.
     *
     * @param bool $passed
     *
     * @return self
     */
    public function setPassed(bool $passed): self
    {
        $this->initialized['passed'] = true;
        $this->passed = $passed;
        return $this;
    }
}
