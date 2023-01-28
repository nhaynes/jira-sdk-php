<?php

namespace JiraSdk\Model;

class RemoteIssueLinkIdentifies
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
     * The ID of the remote issue link, such as the ID of the item on the remote system.
     *
     * @var int
     */
    protected $id;
    /**
     * The URL of the remote issue link.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the remote issue link, such as the ID of the item on the remote system.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the remote issue link, such as the ID of the item on the remote system.
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
     * The URL of the remote issue link.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the remote issue link.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
}
