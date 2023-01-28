<?php

namespace JiraSdk\Model;

class IssueContextVariable extends CustomContextVariable
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
     * The issue ID.
     *
     * @var int
     */
    protected $id;
    /**
     * The issue key.
     *
     * @var string
     */
    protected $key;
    /**
     * The issue ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The issue ID.
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
     * The issue key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The issue key.
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
}
