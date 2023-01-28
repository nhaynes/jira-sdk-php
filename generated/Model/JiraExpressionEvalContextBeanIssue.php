<?php

namespace JiraSdk\Model;

class JiraExpressionEvalContextBeanIssue extends \ArrayObject
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
     * The ID of the referenced item.
     *
     * @var int
     */
    protected $id;
    /**
     * The key of the referenced item.
     *
     * @var string
     */
    protected $key;
    /**
     * The ID of the referenced item.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the referenced item.
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
     * The key of the referenced item.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the referenced item.
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
