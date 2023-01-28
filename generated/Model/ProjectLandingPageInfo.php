<?php

namespace JiraSdk\Model;

class ProjectLandingPageInfo
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
     *
     *
     * @var string
     */
    protected $url;
    /**
     *
     *
     * @var string
     */
    protected $projectKey;
    /**
     *
     *
     * @var string
     */
    protected $projectType;
    /**
     *
     *
     * @var string[]
     */
    protected $attributes;
    /**
     *
     *
     * @var bool
     */
    protected $simplified;
    /**
     *
     *
     * @var int
     */
    protected $boardId;
    /**
     *
     *
     * @var string
     */
    protected $boardName;
    /**
     *
     *
     * @var bool
     */
    protected $simpleBoard;
    /**
     *
     *
     * @var int
     */
    protected $queueId;
    /**
     *
     *
     * @var string
     */
    protected $queueName;
    /**
     *
     *
     * @var string
     */
    protected $queueCategory;
    /**
     *
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    /**
     *
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getProjectKey(): string
    {
        return $this->projectKey;
    }
    /**
     *
     *
     * @param string $projectKey
     *
     * @return self
     */
    public function setProjectKey(string $projectKey): self
    {
        $this->initialized['projectKey'] = true;
        $this->projectKey = $projectKey;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getProjectType(): string
    {
        return $this->projectType;
    }
    /**
     *
     *
     * @param string $projectType
     *
     * @return self
     */
    public function setProjectType(string $projectType): self
    {
        $this->initialized['projectType'] = true;
        $this->projectType = $projectType;
        return $this;
    }
    /**
     *
     *
     * @return string[]
     */
    public function getAttributes(): iterable
    {
        return $this->attributes;
    }
    /**
     *
     *
     * @param string[] $attributes
     *
     * @return self
     */
    public function setAttributes(iterable $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getSimplified(): bool
    {
        return $this->simplified;
    }
    /**
     *
     *
     * @param bool $simplified
     *
     * @return self
     */
    public function setSimplified(bool $simplified): self
    {
        $this->initialized['simplified'] = true;
        $this->simplified = $simplified;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getBoardId(): int
    {
        return $this->boardId;
    }
    /**
     *
     *
     * @param int $boardId
     *
     * @return self
     */
    public function setBoardId(int $boardId): self
    {
        $this->initialized['boardId'] = true;
        $this->boardId = $boardId;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getBoardName(): string
    {
        return $this->boardName;
    }
    /**
     *
     *
     * @param string $boardName
     *
     * @return self
     */
    public function setBoardName(string $boardName): self
    {
        $this->initialized['boardName'] = true;
        $this->boardName = $boardName;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getSimpleBoard(): bool
    {
        return $this->simpleBoard;
    }
    /**
     *
     *
     * @param bool $simpleBoard
     *
     * @return self
     */
    public function setSimpleBoard(bool $simpleBoard): self
    {
        $this->initialized['simpleBoard'] = true;
        $this->simpleBoard = $simpleBoard;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getQueueId(): int
    {
        return $this->queueId;
    }
    /**
     *
     *
     * @param int $queueId
     *
     * @return self
     */
    public function setQueueId(int $queueId): self
    {
        $this->initialized['queueId'] = true;
        $this->queueId = $queueId;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getQueueName(): string
    {
        return $this->queueName;
    }
    /**
     *
     *
     * @param string $queueName
     *
     * @return self
     */
    public function setQueueName(string $queueName): self
    {
        $this->initialized['queueName'] = true;
        $this->queueName = $queueName;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getQueueCategory(): string
    {
        return $this->queueCategory;
    }
    /**
     *
     *
     * @param string $queueCategory
     *
     * @return self
     */
    public function setQueueCategory(string $queueCategory): self
    {
        $this->initialized['queueCategory'] = true;
        $this->queueCategory = $queueCategory;
        return $this;
    }
}
