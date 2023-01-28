<?php

namespace JiraSdk\Model;

class RemoteIssueLinkObject extends \ArrayObject
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
     * The URL of the item.
     *
     * @var string
     */
    protected $url;
    /**
     * The title of the item.
     *
     * @var string
     */
    protected $title;
    /**
     * The summary details of the item.
     *
     * @var string
     */
    protected $summary;
    /**
     * Details of the icon for the item. If no icon is defined, the default link icon is used in Jira.
     *
     * @var RemoteObjectIcon
     */
    protected $icon;
    /**
     * The status of the item.
     *
     * @var RemoteObjectStatus
     */
    protected $status;
    /**
     * The URL of the item.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    /**
     * The URL of the item.
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * The title of the item.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * The title of the item.
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * The summary details of the item.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }
    /**
     * The summary details of the item.
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary(string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * Details of the icon for the item. If no icon is defined, the default link icon is used in Jira.
     *
     * @return RemoteObjectIcon
     */
    public function getIcon(): RemoteObjectIcon
    {
        return $this->icon;
    }
    /**
     * Details of the icon for the item. If no icon is defined, the default link icon is used in Jira.
     *
     * @param RemoteObjectIcon $icon
     *
     * @return self
     */
    public function setIcon(RemoteObjectIcon $icon): self
    {
        $this->initialized['icon'] = true;
        $this->icon = $icon;
        return $this;
    }
    /**
     * The status of the item.
     *
     * @return RemoteObjectStatus
     */
    public function getStatus(): RemoteObjectStatus
    {
        return $this->status;
    }
    /**
     * The status of the item.
     *
     * @param RemoteObjectStatus $status
     *
     * @return self
     */
    public function setStatus(RemoteObjectStatus $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}
