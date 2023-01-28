<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueSingleGroupPicker extends \ArrayObject
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
     * The ID of the the default group.
     *
     * @var string
     */
    protected $groupId;
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
     * The ID of the the default group.
     *
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }
    /**
     * The ID of the the default group.
     *
     * @param string $groupId
     *
     * @return self
     */
    public function setGroupId(string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
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
