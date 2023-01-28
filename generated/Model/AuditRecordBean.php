<?php

namespace JiraSdk\Model;

class AuditRecordBean
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
     * The ID of the audit record.
     *
     * @var int
     */
    protected $id;
    /**
     * The summary of the audit record.
     *
     * @var string
     */
    protected $summary;
    /**
     * The URL of the computer where the creation of the audit record was initiated.
     *
     * @var string
     */
    protected $remoteAddress;
    /**
     * Deprecated, use `authorAccountId` instead. The key of the user who created the audit record.
     *
     * @var string
     */
    protected $authorKey;
    /**
     * The date and time on which the audit record was created.
     *
     * @var \DateTime
     */
    protected $created;
    /**
     * The category of the audit record. For a list of these categories, see the help article [Auditing in Jira applications](https://confluence.atlassian.com/x/noXKM).
     *
     * @var string
     */
    protected $category;
    /**
     * The event the audit record originated from.
     *
     * @var string
     */
    protected $eventSource;
    /**
     * The description of the audit record.
     *
     * @var string
     */
    protected $description;
    /**
     * Details of an item associated with the changed record.
     *
     * @var AssociatedItemBean
     */
    protected $objectItem;
    /**
     * The list of values changed in the record event.
     *
     * @var ChangedValueBean[]
     */
    protected $changedValues;
    /**
     * The list of items associated with the changed record.
     *
     * @var AssociatedItemBean[]
     */
    protected $associatedItems;
    /**
     * The ID of the audit record.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the audit record.
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
     * The summary of the audit record.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }
    /**
     * The summary of the audit record.
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary(string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * The URL of the computer where the creation of the audit record was initiated.
     *
     * @return string
     */
    public function getRemoteAddress(): string
    {
        return $this->remoteAddress;
    }
    /**
     * The URL of the computer where the creation of the audit record was initiated.
     *
     * @param string $remoteAddress
     *
     * @return self
     */
    public function setRemoteAddress(string $remoteAddress): self
    {
        $this->initialized['remoteAddress'] = true;
        $this->remoteAddress = $remoteAddress;
        return $this;
    }
    /**
     * Deprecated, use `authorAccountId` instead. The key of the user who created the audit record.
     *
     * @return string
     */
    public function getAuthorKey(): string
    {
        return $this->authorKey;
    }
    /**
     * Deprecated, use `authorAccountId` instead. The key of the user who created the audit record.
     *
     * @param string $authorKey
     *
     * @return self
     */
    public function setAuthorKey(string $authorKey): self
    {
        $this->initialized['authorKey'] = true;
        $this->authorKey = $authorKey;
        return $this;
    }
    /**
     * The date and time on which the audit record was created.
     *
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }
    /**
     * The date and time on which the audit record was created.
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
     * The category of the audit record. For a list of these categories, see the help article [Auditing in Jira applications](https://confluence.atlassian.com/x/noXKM).
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }
    /**
     * The category of the audit record. For a list of these categories, see the help article [Auditing in Jira applications](https://confluence.atlassian.com/x/noXKM).
     *
     * @param string $category
     *
     * @return self
     */
    public function setCategory(string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * The event the audit record originated from.
     *
     * @return string
     */
    public function getEventSource(): string
    {
        return $this->eventSource;
    }
    /**
     * The event the audit record originated from.
     *
     * @param string $eventSource
     *
     * @return self
     */
    public function setEventSource(string $eventSource): self
    {
        $this->initialized['eventSource'] = true;
        $this->eventSource = $eventSource;
        return $this;
    }
    /**
     * The description of the audit record.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the audit record.
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
     * Details of an item associated with the changed record.
     *
     * @return AssociatedItemBean
     */
    public function getObjectItem(): AssociatedItemBean
    {
        return $this->objectItem;
    }
    /**
     * Details of an item associated with the changed record.
     *
     * @param AssociatedItemBean $objectItem
     *
     * @return self
     */
    public function setObjectItem(AssociatedItemBean $objectItem): self
    {
        $this->initialized['objectItem'] = true;
        $this->objectItem = $objectItem;
        return $this;
    }
    /**
     * The list of values changed in the record event.
     *
     * @return ChangedValueBean[]
     */
    public function getChangedValues(): array
    {
        return $this->changedValues;
    }
    /**
     * The list of values changed in the record event.
     *
     * @param ChangedValueBean[] $changedValues
     *
     * @return self
     */
    public function setChangedValues(array $changedValues): self
    {
        $this->initialized['changedValues'] = true;
        $this->changedValues = $changedValues;
        return $this;
    }
    /**
     * The list of items associated with the changed record.
     *
     * @return AssociatedItemBean[]
     */
    public function getAssociatedItems(): array
    {
        return $this->associatedItems;
    }
    /**
     * The list of items associated with the changed record.
     *
     * @param AssociatedItemBean[] $associatedItems
     *
     * @return self
     */
    public function setAssociatedItems(array $associatedItems): self
    {
        $this->initialized['associatedItems'] = true;
        $this->associatedItems = $associatedItems;
        return $this;
    }
}
