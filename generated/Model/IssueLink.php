<?php

namespace JiraSdk\Model;

class IssueLink
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
     * The ID of the issue link.
     *
     * @var string
     */
    protected $id;
    /**
     * The URL of the issue link.
     *
     * @var string
     */
    protected $self;
    /**
     * The type of link between the issues.
     *
     * @var IssueLinkType
     */
    protected $type;
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
     *
     * @var IssueLinkInwardIssue
     */
    protected $inwardIssue;
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
     *
     * @var IssueLinkOutwardIssue
     */
    protected $outwardIssue;
    /**
     * The ID of the issue link.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the issue link.
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
     * The URL of the issue link.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the issue link.
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
     * The type of link between the issues.
     *
     * @return IssueLinkType
     */
    public function getType(): IssueLinkType
    {
        return $this->type;
    }
    /**
     * The type of link between the issues.
     *
     * @param IssueLinkType $type
     *
     * @return self
     */
    public function setType(IssueLinkType $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
     *
     * @return IssueLinkInwardIssue
     */
    public function getInwardIssue(): IssueLinkInwardIssue
    {
        return $this->inwardIssue;
    }
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
     *
     * @param IssueLinkInwardIssue $inwardIssue
     *
     * @return self
     */
    public function setInwardIssue(IssueLinkInwardIssue $inwardIssue): self
    {
        $this->initialized['inwardIssue'] = true;
        $this->inwardIssue = $inwardIssue;
        return $this;
    }
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
     *
     * @return IssueLinkOutwardIssue
     */
    public function getOutwardIssue(): IssueLinkOutwardIssue
    {
        return $this->outwardIssue;
    }
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
     *
     * @param IssueLinkOutwardIssue $outwardIssue
     *
     * @return self
     */
    public function setOutwardIssue(IssueLinkOutwardIssue $outwardIssue): self
    {
        $this->initialized['outwardIssue'] = true;
        $this->outwardIssue = $outwardIssue;
        return $this;
    }
}
