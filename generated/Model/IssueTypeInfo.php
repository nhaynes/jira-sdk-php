<?php

namespace JiraSdk\Model;

class IssueTypeInfo
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
     * The ID of the issue type.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the issue type.
     *
     * @var string
     */
    protected $name;
    /**
     * The avatar of the issue type.
     *
     * @var int
     */
    protected $avatarId;
    /**
     * The ID of the issue type.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the issue type.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The name of the issue type.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue type.
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
     * The avatar of the issue type.
     *
     * @return int
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }
    /**
     * The avatar of the issue type.
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
