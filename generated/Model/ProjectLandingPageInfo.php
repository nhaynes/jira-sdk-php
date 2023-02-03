<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class ProjectLandingPageInfo
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $projectKey;
    /**
     * @var string
     */
    protected $projectType;
    /**
     * @var int
     */
    protected $boardId;
    /**
     * @var string
     */
    protected $boardName;
    /**
     * @var bool
     */
    protected $simpleBoard;
    /**
     * @var int
     */
    protected $queueId;
    /**
     * @var string
     */
    protected $queueName;
    /**
     * @var string
     */
    protected $queueCategory;
    /**
     * @var string[]
     */
    protected $attributes;
    /**
     * @var bool
     */
    protected $simplified;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }

    public function getProjectKey(): string
    {
        return $this->projectKey;
    }

    public function setProjectKey(string $projectKey): self
    {
        $this->initialized['projectKey'] = true;
        $this->projectKey = $projectKey;

        return $this;
    }

    public function getProjectType(): string
    {
        return $this->projectType;
    }

    public function setProjectType(string $projectType): self
    {
        $this->initialized['projectType'] = true;
        $this->projectType = $projectType;

        return $this;
    }

    public function getBoardId(): int
    {
        return $this->boardId;
    }

    public function setBoardId(int $boardId): self
    {
        $this->initialized['boardId'] = true;
        $this->boardId = $boardId;

        return $this;
    }

    public function getBoardName(): string
    {
        return $this->boardName;
    }

    public function setBoardName(string $boardName): self
    {
        $this->initialized['boardName'] = true;
        $this->boardName = $boardName;

        return $this;
    }

    public function getSimpleBoard(): bool
    {
        return $this->simpleBoard;
    }

    public function setSimpleBoard(bool $simpleBoard): self
    {
        $this->initialized['simpleBoard'] = true;
        $this->simpleBoard = $simpleBoard;

        return $this;
    }

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function setQueueId(int $queueId): self
    {
        $this->initialized['queueId'] = true;
        $this->queueId = $queueId;

        return $this;
    }

    public function getQueueName(): string
    {
        return $this->queueName;
    }

    public function setQueueName(string $queueName): self
    {
        $this->initialized['queueName'] = true;
        $this->queueName = $queueName;

        return $this;
    }

    public function getQueueCategory(): string
    {
        return $this->queueCategory;
    }

    public function setQueueCategory(string $queueCategory): self
    {
        $this->initialized['queueCategory'] = true;
        $this->queueCategory = $queueCategory;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAttributes(): iterable
    {
        return $this->attributes;
    }

    /**
     * @param string[] $attributes
     */
    public function setAttributes(iterable $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;

        return $this;
    }

    public function getSimplified(): bool
    {
        return $this->simplified;
    }

    public function setSimplified(bool $simplified): self
    {
        $this->initialized['simplified'] = true;
        $this->simplified = $simplified;

        return $this;
    }
}
