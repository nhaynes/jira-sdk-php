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

class LinkedIssue
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of an issue. Required if `key` isn't provided.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of an issue. Required if `id` isn't provided.
     *
     * @var string
     */
    protected $key;
    /**
     * The URL of the issue.
     *
     * @var string
     */
    protected $self;
    /**
     * The fields associated with the issue.
     *
     * @var LinkedIssueFields
     */
    protected $fields;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of an issue. Required if `key` isn't provided.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of an issue. Required if `key` isn't provided.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of an issue. Required if `id` isn't provided.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of an issue. Required if `id` isn't provided.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The URL of the issue.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The fields associated with the issue.
     */
    public function getFields(): LinkedIssueFields
    {
        return $this->fields;
    }

    /**
     * The fields associated with the issue.
     */
    public function setFields(LinkedIssueFields $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }
}
