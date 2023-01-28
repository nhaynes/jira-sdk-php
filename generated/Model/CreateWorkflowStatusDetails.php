<?php

namespace JiraSdk\Model;

class CreateWorkflowStatusDetails
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
     * The ID of the status.
     *
     * @var string
     */
    protected $id;
    /**
     * The properties of the status.
     *
     * @var string[]
     */
    protected $properties;
    /**
     * The ID of the status.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the status.
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
     * The properties of the status.
     *
     * @return string[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }
    /**
     * The properties of the status.
     *
     * @param string[] $properties
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
