<?php

namespace JiraSdk\Model;

class PublishedWorkflowId
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
     * The entity ID of the workflow.
     *
     * @var string
     */
    protected $entityId;
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
     * The entity ID of the workflow.
     *
     * @return string
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }
    /**
     * The entity ID of the workflow.
     *
     * @param string $entityId
     *
     * @return self
     */
    public function setEntityId(string $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;
        return $this;
    }
}
