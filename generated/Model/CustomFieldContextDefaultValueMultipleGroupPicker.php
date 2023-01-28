<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueMultipleGroupPicker extends \ArrayObject
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
     * The IDs of the default groups.
     *
     * @var string[]
     */
    protected $groupIds;
    /**
     *
     *
     * @var string
     */
    protected $type;
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
     * The IDs of the default groups.
     *
     * @return string[]
     */
    public function getGroupIds(): array
    {
        return $this->groupIds;
    }
    /**
     * The IDs of the default groups.
     *
     * @param string[] $groupIds
     *
     * @return self
     */
    public function setGroupIds(array $groupIds): self
    {
        $this->initialized['groupIds'] = true;
        $this->groupIds = $groupIds;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
