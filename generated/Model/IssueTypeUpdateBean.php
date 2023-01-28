<?php

namespace JiraSdk\Model;

class IssueTypeUpdateBean
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
     * The unique name for the issue type. The maximum length is 60 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type.
     *
     * @var string
     */
    protected $description;
    /**
     * The ID of an issue type avatar.
     *
     * @var int
     */
    protected $avatarId;
    /**
     * The unique name for the issue type. The maximum length is 60 characters.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The unique name for the issue type. The maximum length is 60 characters.
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
     * The description of the issue type.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue type.
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
     * The ID of an issue type avatar.
     *
     * @return int
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }
    /**
     * The ID of an issue type avatar.
     *
     * @param int $avatarId
     *
     * @return self
     */
    public function setAvatarId(int $avatarId): self
    {
        $this->initialized['avatarId'] = true;
        $this->avatarId = $avatarId;
        return $this;
    }
}
