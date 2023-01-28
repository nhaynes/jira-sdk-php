<?php

namespace JiraSdk\Model;

class ReorderIssueResolutionsRequest
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
     * The list of resolution IDs to be reordered. Cannot contain duplicates nor after ID.
     *
     * @var string[]
     */
    protected $ids;
    /**
     * The ID of the resolution. Required if `position` isn't provided.
     *
     * @var string
     */
    protected $after;
    /**
     * The position for issue resolutions to be moved to. Required if `after` isn't provided.
     *
     * @var string
     */
    protected $position;
    /**
     * The list of resolution IDs to be reordered. Cannot contain duplicates nor after ID.
     *
     * @return string[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }
    /**
     * The list of resolution IDs to be reordered. Cannot contain duplicates nor after ID.
     *
     * @param string[] $ids
     *
     * @return self
     */
    public function setIds(array $ids): self
    {
        $this->initialized['ids'] = true;
        $this->ids = $ids;
        return $this;
    }
    /**
     * The ID of the resolution. Required if `position` isn't provided.
     *
     * @return string
     */
    public function getAfter(): string
    {
        return $this->after;
    }
    /**
     * The ID of the resolution. Required if `position` isn't provided.
     *
     * @param string $after
     *
     * @return self
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;
        return $this;
    }
    /**
     * The position for issue resolutions to be moved to. Required if `after` isn't provided.
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }
    /**
     * The position for issue resolutions to be moved to. Required if `after` isn't provided.
     *
     * @param string $position
     *
     * @return self
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;
        return $this;
    }
}
