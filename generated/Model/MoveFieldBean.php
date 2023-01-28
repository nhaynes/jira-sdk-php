<?php

namespace JiraSdk\Model;

class MoveFieldBean
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
     * The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided.
     *
     * @var string
     */
    protected $after;
    /**
     * The named position to which the screen tab field should be moved. Required if `after` isn't provided.
     *
     * @var string
     */
    protected $position;
    /**
     * The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided.
     *
     * @return string
     */
    public function getAfter(): string
    {
        return $this->after;
    }
    /**
     * The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided.
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
     * The named position to which the screen tab field should be moved. Required if `after` isn't provided.
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }
    /**
     * The named position to which the screen tab field should be moved. Required if `after` isn't provided.
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
