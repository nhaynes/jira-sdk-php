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

class Field
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the field.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the field.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the field.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The schema of a field.
     */
    public function getSchema(): JsonTypeBean
    {
        return $this->schema;
    }

    /**
     * The schema of a field.
     */
    public function setSchema(JsonTypeBean $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;

        return $this;
    }

    /**
     * The description of the field.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the field.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The key of the field.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the field.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * Whether the field is locked.
     */
    public function getIsLocked(): bool
    {
        return $this->isLocked;
    }

    /**
     * Whether the field is locked.
     */
    public function setIsLocked(bool $isLocked): self
    {
        $this->initialized['isLocked'] = true;
        $this->isLocked = $isLocked;

        return $this;
    }

    /**
     * Whether the field is shown on screen or not.
     */
    public function getIsUnscreenable(): bool
    {
        return $this->isUnscreenable;
    }

    /**
     * Whether the field is shown on screen or not.
     */
    public function setIsUnscreenable(bool $isUnscreenable): self
    {
        $this->initialized['isUnscreenable'] = true;
        $this->isUnscreenable = $isUnscreenable;

        return $this;
    }

    /**
     * The searcher key of the field. Returned for custom fields.
     */
    public function getSearcherKey(): string
    {
        return $this->searcherKey;
    }

    /**
     * The searcher key of the field. Returned for custom fields.
     */
    public function setSearcherKey(string $searcherKey): self
    {
        $this->initialized['searcherKey'] = true;
        $this->searcherKey = $searcherKey;

        return $this;
    }

    /**
     * Number of screens where the field is used.
     */
    public function getScreensCount(): int
    {
        return $this->screensCount;
    }

    /**
     * Number of screens where the field is used.
     */
    public function setScreensCount(int $screensCount): self
    {
        $this->initialized['screensCount'] = true;
        $this->screensCount = $screensCount;

        return $this;
    }

    /**
     * Number of contexts where the field is used.
     */
    public function getContextsCount(): int
    {
        return $this->contextsCount;
    }

    /**
     * Number of contexts where the field is used.
     */
    public function setContextsCount(int $contextsCount): self
    {
        $this->initialized['contextsCount'] = true;
        $this->contextsCount = $contextsCount;

        return $this;
    }

    /**
     * Number of projects where the field is used.
     */
    public function getProjectsCount(): int
    {
        return $this->projectsCount;
    }

    /**
     * Number of projects where the field is used.
     */
    public function setProjectsCount(int $projectsCount): self
    {
        $this->initialized['projectsCount'] = true;
        $this->projectsCount = $projectsCount;

        return $this;
    }

    /**
     * Information about the most recent use of a field.
     */
    public function getLastUsed(): FieldLastUsed
    {
        return $this->lastUsed;
    }

    /**
     * Information about the most recent use of a field.
     */
    public function setLastUsed(FieldLastUsed $lastUsed): self
    {
        $this->initialized['lastUsed'] = true;
        $this->lastUsed = $lastUsed;

        return $this;
    }
}
