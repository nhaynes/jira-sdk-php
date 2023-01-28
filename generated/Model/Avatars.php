<?php

namespace JiraSdk\Model;

class Avatars
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
     * System avatars list.
     *
     * @var Avatar[]
     */
    protected $system;
    /**
     * Custom avatars list.
     *
     * @var Avatar[]
     */
    protected $custom;
    /**
     * System avatars list.
     *
     * @return Avatar[]
     */
    public function getSystem(): array
    {
        return $this->system;
    }
    /**
     * System avatars list.
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
    /**
     * Custom avatars list.
     *
     * @return Avatar[]
     */
    public function getCustom(): array
    {
        return $this->custom;
    }
    /**
     * Custom avatars list.
     *
     * @param Avatar[] $custom
     *
     * @return self
     */
    public function setCustom(array $custom): self
    {
        $this->initialized['custom'] = true;
        $this->custom = $custom;
        return $this;
    }
}
