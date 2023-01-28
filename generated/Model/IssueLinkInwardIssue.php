<?php

namespace JiraSdk\Model;

class IssueLinkInwardIssue extends \ArrayObject
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
    /**
     * The ID of an issue. Required if `key` isn't provided.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of an issue. Required if `key` isn't provided.
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
     * The key of an issue. Required if `id` isn't provided.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of an issue. Required if `id` isn't provided.
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
     * The URL of the issue.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the issue.
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
     * The fields associated with the issue.
     *
     * @return LinkedIssueFields
     */
    public function getFields(): LinkedIssueFields
    {
        return $this->fields;
    }
    /**
     * The fields associated with the issue.
     *
     * @param LinkedIssueFields $fields
     *
     * @return self
     */
    public function setFields(LinkedIssueFields $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
}
