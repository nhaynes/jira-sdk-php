<?php

namespace JiraSdk\Model;

class Worklog extends \ArrayObject
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
     * The URL of the worklog item.
     *
     * @var string
     */
    protected $self;
    /**
     * Details of the user who created the worklog.
     *
     * @var WorklogAuthor
     */
    protected $author;
    /**
     * Details of the user who last updated the worklog.
     *
     * @var WorklogUpdateAuthor
     */
    protected $updateAuthor;
    /**
     * A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog.
     *
     * @var mixed
     */
    protected $comment;
    /**
     * The datetime on which the worklog was created.
     *
     * @var \DateTime
     */
    protected $created;
    /**
     * The datetime on which the worklog was last updated.
     *
     * @var \DateTime
     */
    protected $updated;
    /**
     * Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog.
     *
     * @var WorklogVisibility
     */
    protected $visibility;
    /**
     * The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog.
     *
     * @var \DateTime
     */
    protected $started;
    /**
     * The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided.
     *
     * @var string
     */
    protected $timeSpent;
    /**
     * The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided.
     *
     * @var int
     */
    protected $timeSpentSeconds;
    /**
     * The ID of the worklog record.
     *
     * @var string
     */
    protected $id;
    /**
     * The ID of the issue this worklog is for.
     *
     * @var string
     */
    protected $issueId;
    /**
     * Details of properties for the worklog. Optional when creating or updating a worklog.
     *
     * @var EntityProperty[]
     */
    protected $properties;
    /**
     * The URL of the worklog item.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the worklog item.
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
     * Details of the user who created the worklog.
     *
     * @return WorklogAuthor
     */
    public function getAuthor(): WorklogAuthor
    {
        return $this->author;
    }
    /**
     * Details of the user who created the worklog.
     *
     * @param WorklogAuthor $author
     *
     * @return self
     */
    public function setAuthor(WorklogAuthor $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;
        return $this;
    }
    /**
     * Details of the user who last updated the worklog.
     *
     * @return WorklogUpdateAuthor
     */
    public function getUpdateAuthor(): WorklogUpdateAuthor
    {
        return $this->updateAuthor;
    }
    /**
     * Details of the user who last updated the worklog.
     *
     * @param WorklogUpdateAuthor $updateAuthor
     *
     * @return self
     */
    public function setUpdateAuthor(WorklogUpdateAuthor $updateAuthor): self
    {
        $this->initialized['updateAuthor'] = true;
        $this->updateAuthor = $updateAuthor;
        return $this;
    }
    /**
     * A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog.
     *
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog.
     *
     * @param mixed $comment
     *
     * @return self
     */
    public function setComment($comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
    /**
     * The datetime on which the worklog was created.
     *
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }
    /**
     * The datetime on which the worklog was created.
     *
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * The datetime on which the worklog was last updated.
     *
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }
    /**
     * The datetime on which the worklog was last updated.
     *
     * @param \DateTime $updated
     *
     * @return self
     */
    public function setUpdated(\DateTime $updated): self
    {
        $this->initialized['updated'] = true;
        $this->updated = $updated;
        return $this;
    }
    /**
     * Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog.
     *
     * @return WorklogVisibility
     */
    public function getVisibility(): WorklogVisibility
    {
        return $this->visibility;
    }
    /**
     * Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog.
     *
     * @param WorklogVisibility $visibility
     *
     * @return self
     */
    public function setVisibility(WorklogVisibility $visibility): self
    {
        $this->initialized['visibility'] = true;
        $this->visibility = $visibility;
        return $this;
    }
    /**
     * The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog.
     *
     * @return \DateTime
     */
    public function getStarted(): \DateTime
    {
        return $this->started;
    }
    /**
     * The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog.
     *
     * @param \DateTime $started
     *
     * @return self
     */
    public function setStarted(\DateTime $started): self
    {
        $this->initialized['started'] = true;
        $this->started = $started;
        return $this;
    }
    /**
     * The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided.
     *
     * @return string
     */
    public function getTimeSpent(): string
    {
        return $this->timeSpent;
    }
    /**
     * The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided.
     *
     * @param string $timeSpent
     *
     * @return self
     */
    public function setTimeSpent(string $timeSpent): self
    {
        $this->initialized['timeSpent'] = true;
        $this->timeSpent = $timeSpent;
        return $this;
    }
    /**
     * The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided.
     *
     * @return int
     */
    public function getTimeSpentSeconds(): int
    {
        return $this->timeSpentSeconds;
    }
    /**
     * The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided.
     *
     * @param int $timeSpentSeconds
     *
     * @return self
     */
    public function setTimeSpentSeconds(int $timeSpentSeconds): self
    {
        $this->initialized['timeSpentSeconds'] = true;
        $this->timeSpentSeconds = $timeSpentSeconds;
        return $this;
    }
    /**
     * The ID of the worklog record.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the worklog record.
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
     * The ID of the issue this worklog is for.
     *
     * @return string
     */
    public function getIssueId(): string
    {
        return $this->issueId;
    }
    /**
     * The ID of the issue this worklog is for.
     *
     * @param string $issueId
     *
     * @return self
     */
    public function setIssueId(string $issueId): self
    {
        $this->initialized['issueId'] = true;
        $this->issueId = $issueId;
        return $this;
    }
    /**
     * Details of properties for the worklog. Optional when creating or updating a worklog.
     *
     * @return EntityProperty[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }
    /**
     * Details of properties for the worklog. Optional when creating or updating a worklog.
     *
     * @param EntityProperty[] $properties
     *
     * @return self
     */
    public function setProperties(array $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
}
