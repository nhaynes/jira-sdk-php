<?php

namespace JiraSdk\Model;

class IssueEntityProperties
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
     * A list of entity property IDs.
     *
     * @var int[]
     */
    protected $entitiesIds;
    /**
     * A list of entity property keys and values.
     *
     * @var JsonNode[]
     */
    protected $properties;
    /**
     * A list of entity property IDs.
     *
     * @return int[]
     */
    public function getEntitiesIds(): array
    {
        return $this->entitiesIds;
    }
    /**
     * A list of entity property IDs.
     *
     * @param int[] $entitiesIds
     *
     * @return self
     */
    public function setEntitiesIds(array $entitiesIds): self
    {
        $this->initialized['entitiesIds'] = true;
        $this->entitiesIds = $entitiesIds;
        return $this;
    }
    /**
     * A list of entity property keys and values.
     *
     * @return JsonNode[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }
    /**
     * A list of entity property keys and values.
     *
     * @param JsonNode[] $properties
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
