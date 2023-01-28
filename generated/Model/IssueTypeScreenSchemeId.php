<?php

namespace JiraSdk\Model;

class IssueTypeScreenSchemeId
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
     * The ID of the issue type screen scheme.
     *
     * @var string
     */
    protected $id;
    /**
     * The ID of the issue type screen scheme.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the issue type screen scheme.
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
}
