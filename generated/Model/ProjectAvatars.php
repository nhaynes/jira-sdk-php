<?php

namespace JiraSdk\Model;

class ProjectAvatars
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
     * List of avatars included with Jira. These avatars cannot be deleted.
     *
     * @var Avatar[]
     */
    protected $system;
    /**
     * List of avatars added to Jira. These avatars may be deleted.
     *
     * @var Avatar[]
     */
    protected $custom;
    /**
     * List of avatars included with Jira. These avatars cannot be deleted.
     *
     * @return Avatar[]
     */
    public function getSystem(): array
    {
        return $this->system;
    }
    /**
     * List of avatars included with Jira. These avatars cannot be deleted.
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
     * List of avatars added to Jira. These avatars may be deleted.
     *
     * @return Avatar[]
     */
    public function getCustom(): array
    {
        return $this->custom;
    }
    /**
     * List of avatars added to Jira. These avatars may be deleted.
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
