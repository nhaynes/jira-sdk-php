<?php

namespace JiraSdk\Model;

class RoleActorActorGroup extends \ArrayObject
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
     * The display name of the group.
     *
     * @var string
     */
    protected $displayName;
    /**
     * The name of the group. As a group's name can change, use of `groupId` is recommended to identify the group.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the group.
     *
     * @var string
     */
    protected $groupId;
    /**
     * The display name of the group.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }
    /**
     * The display name of the group.
     *
     * @param string $displayName
     *
     * @return self
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * The name of the group. As a group's name can change, use of `groupId` is recommended to identify the group.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the group. As a group's name can change, use of `groupId` is recommended to identify the group.
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
     * The ID of the group.
     *
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }
    /**
     * The ID of the group.
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
}
