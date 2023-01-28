<?php

namespace JiraSdk\Model;

class VersionMoveBean
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
     * The URL (self link) of the version after which to place the moved version. Cannot be used with `position`.
     *
     * @var string
     */
    protected $after;
    /**
     * An absolute position in which to place the moved version. Cannot be used with `after`.
     *
     * @var string
     */
    protected $position;
    /**
     * The URL (self link) of the version after which to place the moved version. Cannot be used with `position`.
     *
     * @return string
     */
    public function getAfter(): string
    {
        return $this->after;
    }
    /**
     * The URL (self link) of the version after which to place the moved version. Cannot be used with `position`.
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
     * An absolute position in which to place the moved version. Cannot be used with `after`.
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }
    /**
     * An absolute position in which to place the moved version. Cannot be used with `after`.
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
