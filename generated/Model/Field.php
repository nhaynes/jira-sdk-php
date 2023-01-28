<?php

namespace JiraSdk\Model;

class Field
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
     * The ID of the field.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the field.
     *
     * @var string
     */
    protected $name;
    /**
     * The schema of a field.
     *
     * @var JsonTypeBean
     */
    protected $schema;
    /**
     * The description of the field.
     *
     * @var string
     */
    protected $description;
    /**
     * The key of the field.
     *
     * @var string
     */
    protected $key;
    /**
     * Whether the field is locked.
     *
     * @var bool
     */
    protected $isLocked;
    /**
     * Whether the field is shown on screen or not.
     *
     * @var bool
     */
    protected $isUnscreenable;
    /**
     * The searcher key of the field. Returned for custom fields.
     *
     * @var string
     */
    protected $searcherKey;
    /**
     * Number of screens where the field is used.
     *
     * @var int
     */
    protected $screensCount;
    /**
     * Number of contexts where the field is used.
     *
     * @var int
     */
    protected $contextsCount;
    /**
     * Number of projects where the field is used.
     *
     * @var int
     */
    protected $projectsCount;
    /**
     * Information about the most recent use of a field.
     *
     * @var FieldLastUsed
     */
    protected $lastUsed;
    /**
     * The ID of the field.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the field.
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
     * The name of the field.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the field.
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
     * The schema of a field.
     *
     * @return JsonTypeBean
     */
    public function getSchema(): JsonTypeBean
    {
        return $this->schema;
    }
    /**
     * The schema of a field.
     *
     * @param JsonTypeBean $schema
     *
     * @return self
     */
    public function setSchema(JsonTypeBean $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;
        return $this;
    }
    /**
     * The description of the field.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the field.
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
     * The key of the field.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the field.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * Whether the field is locked.
     *
     * @return bool
     */
    public function getIsLocked(): bool
    {
        return $this->isLocked;
    }
    /**
     * Whether the field is locked.
     *
     * @param bool $isLocked
     *
     * @return self
     */
    public function setIsLocked(bool $isLocked): self
    {
        $this->initialized['isLocked'] = true;
        $this->isLocked = $isLocked;
        return $this;
    }
    /**
     * Whether the field is shown on screen or not.
     *
     * @return bool
     */
    public function getIsUnscreenable(): bool
    {
        return $this->isUnscreenable;
    }
    /**
     * Whether the field is shown on screen or not.
     *
     * @param bool $isUnscreenable
     *
     * @return self
     */
    public function setIsUnscreenable(bool $isUnscreenable): self
    {
        $this->initialized['isUnscreenable'] = true;
        $this->isUnscreenable = $isUnscreenable;
        return $this;
    }
    /**
     * The searcher key of the field. Returned for custom fields.
     *
     * @return string
     */
    public function getSearcherKey(): string
    {
        return $this->searcherKey;
    }
    /**
     * The searcher key of the field. Returned for custom fields.
     *
     * @param string $searcherKey
     *
     * @return self
     */
    public function setSearcherKey(string $searcherKey): self
    {
        $this->initialized['searcherKey'] = true;
        $this->searcherKey = $searcherKey;
        return $this;
    }
    /**
     * Number of screens where the field is used.
     *
     * @return int
     */
    public function getScreensCount(): int
    {
        return $this->screensCount;
    }
    /**
     * Number of screens where the field is used.
     *
     * @param int $screensCount
     *
     * @return self
     */
    public function setScreensCount(int $screensCount): self
    {
        $this->initialized['screensCount'] = true;
        $this->screensCount = $screensCount;
        return $this;
    }
    /**
     * Number of contexts where the field is used.
     *
     * @return int
     */
    public function getContextsCount(): int
    {
        return $this->contextsCount;
    }
    /**
     * Number of contexts where the field is used.
     *
     * @param int $contextsCount
     *
     * @return self
     */
    public function setContextsCount(int $contextsCount): self
    {
        $this->initialized['contextsCount'] = true;
        $this->contextsCount = $contextsCount;
        return $this;
    }
    /**
     * Number of projects where the field is used.
     *
     * @return int
     */
    public function getProjectsCount(): int
    {
        return $this->projectsCount;
    }
    /**
     * Number of projects where the field is used.
     *
     * @param int $projectsCount
     *
     * @return self
     */
    public function setProjectsCount(int $projectsCount): self
    {
        $this->initialized['projectsCount'] = true;
        $this->projectsCount = $projectsCount;
        return $this;
    }
    /**
     * Information about the most recent use of a field.
     *
     * @return FieldLastUsed
     */
    public function getLastUsed(): FieldLastUsed
    {
        return $this->lastUsed;
    }
    /**
     * Information about the most recent use of a field.
     *
     * @param FieldLastUsed $lastUsed
     *
     * @return self
     */
    public function setLastUsed(FieldLastUsed $lastUsed): self
    {
        $this->initialized['lastUsed'] = true;
        $this->lastUsed = $lastUsed;
        return $this;
    }
}
