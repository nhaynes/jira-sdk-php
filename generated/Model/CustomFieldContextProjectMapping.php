<?php

namespace JiraSdk\Model;

class CustomFieldContextProjectMapping
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
     * The ID of the context.
     *
     * @var string
     */
    protected $contextId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * Whether context is global.
     *
     * @var bool
     */
    protected $isGlobalContext;
    /**
     * The ID of the context.
     *
     * @return string
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }
    /**
     * The ID of the context.
     *
     * @param string $contextId
     *
     * @return self
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;
        return $this;
    }
    /**
     * The ID of the project.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     * The ID of the project.
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
    /**
     * Whether context is global.
     *
     * @return bool
     */
    public function getIsGlobalContext(): bool
    {
        return $this->isGlobalContext;
    }
    /**
     * Whether context is global.
     *
     * @param bool $isGlobalContext
     *
     * @return self
     */
    public function setIsGlobalContext(bool $isGlobalContext): self
    {
        $this->initialized['isGlobalContext'] = true;
        $this->isGlobalContext = $isGlobalContext;
        return $this;
    }
}
