<?php

namespace JiraSdk\Model;

class RemoteObjectStatus extends \ArrayObject
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
     * Whether the item is resolved. If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
     *
     * @var bool
     */
    protected $resolved;
    /**
     * Details of the icon representing the status. If not provided, no status icon displays in Jira.
     *
     * @var StatusIcon
     */
    protected $icon;
    /**
     * Whether the item is resolved. If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
     *
     * @return bool
     */
    public function getResolved(): bool
    {
        return $this->resolved;
    }
    /**
     * Whether the item is resolved. If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
     *
     * @param bool $resolved
     *
     * @return self
     */
    public function setResolved(bool $resolved): self
    {
        $this->initialized['resolved'] = true;
        $this->resolved = $resolved;
        return $this;
    }
    /**
     * Details of the icon representing the status. If not provided, no status icon displays in Jira.
     *
     * @return StatusIcon
     */
    public function getIcon(): StatusIcon
    {
        return $this->icon;
    }
    /**
     * Details of the icon representing the status. If not provided, no status icon displays in Jira.
     *
     * @param StatusIcon $icon
     *
     * @return self
     */
    public function setIcon(StatusIcon $icon): self
    {
        $this->initialized['icon'] = true;
        $this->icon = $icon;
        return $this;
    }
}
