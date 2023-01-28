<?php

namespace JiraSdk\Model;

class SystemAvatars
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
     * A list of avatar details.
     *
     * @var Avatar[]
     */
    protected $system;
    /**
     * A list of avatar details.
     *
     * @return Avatar[]
     */
    public function getSystem(): array
    {
        return $this->system;
    }
    /**
     * A list of avatar details.
     *
     * @param Avatar[] $system
     *
     * @return self
     */
    public function setSystem(array $system): self
    {
        $this->initialized['system'] = true;
        $this->system = $system;
        return $this;
    }
}
