<?php

namespace JiraSdk\Model;

class WorkManagementNavigationInfo extends \ArrayObject
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
     *
     *
     * @var string
     */
    protected $boardName;
    /**
     *
     *
     * @return string
     */
    public function getBoardName(): string
    {
        return $this->boardName;
    }
    /**
     *
     *
     * @param string $boardName
     *
     * @return self
     */
    public function setBoardName(string $boardName): self
    {
        $this->initialized['boardName'] = true;
        $this->boardName = $boardName;
        return $this;
    }
}
