<?php

namespace JiraSdk\Model;

class RemoteIssueLink
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
     * The ID of the link.
     *
     * @var int
     */
    protected $id;
    /**
     * The URL of the link.
     *
     * @var string
     */
    protected $self;
    /**
     * The global ID of the link, such as the ID of the item on the remote system.
     *
     * @var string
     */
    protected $globalId;
    /**
     * Details of the remote application the linked item is in.
     *
     * @var RemoteIssueLinkApplication
     */
    protected $application;
    /**
     * Description of the relationship between the issue and the linked item.
     *
     * @var string
     */
    protected $relationship;
    /**
     * Details of the item linked to.
     *
     * @var RemoteIssueLinkObject
     */
    protected $object;
    /**
     * The ID of the link.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the link.
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
     * The URL of the link.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the link.
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
    /**
     * The global ID of the link, such as the ID of the item on the remote system.
     *
     * @return string
     */
    public function getGlobalId(): string
    {
        return $this->globalId;
    }
    /**
     * The global ID of the link, such as the ID of the item on the remote system.
     *
     * @param string $globalId
     *
     * @return self
     */
    public function setGlobalId(string $globalId): self
    {
        $this->initialized['globalId'] = true;
        $this->globalId = $globalId;
        return $this;
    }
    /**
     * Details of the remote application the linked item is in.
     *
     * @return RemoteIssueLinkApplication
     */
    public function getApplication(): RemoteIssueLinkApplication
    {
        return $this->application;
    }
    /**
     * Details of the remote application the linked item is in.
     *
     * @param RemoteIssueLinkApplication $application
     *
     * @return self
     */
    public function setApplication(RemoteIssueLinkApplication $application): self
    {
        $this->initialized['application'] = true;
        $this->application = $application;
        return $this;
    }
    /**
     * Description of the relationship between the issue and the linked item.
     *
     * @return string
     */
    public function getRelationship(): string
    {
        return $this->relationship;
    }
    /**
     * Description of the relationship between the issue and the linked item.
     *
     * @param string $relationship
     *
     * @return self
     */
    public function setRelationship(string $relationship): self
    {
        $this->initialized['relationship'] = true;
        $this->relationship = $relationship;
        return $this;
    }
    /**
     * Details of the item linked to.
     *
     * @return RemoteIssueLinkObject
     */
    public function getObject(): RemoteIssueLinkObject
    {
        return $this->object;
    }
    /**
     * Details of the item linked to.
     *
     * @param RemoteIssueLinkObject $object
     *
     * @return self
     */
    public function setObject(RemoteIssueLinkObject $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;
        return $this;
    }
}
