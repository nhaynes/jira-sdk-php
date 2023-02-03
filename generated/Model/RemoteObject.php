<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class RemoteObject extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the item.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * The URL of the item.
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }

    /**
     * The title of the item.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * The title of the item.
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * The summary details of the item.
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * The summary details of the item.
     */
    public function setSummary(string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;

        return $this;
    }

    /**
     * Details of the icon for the item. If no icon is defined, the default link icon is used in Jira.
     */
    public function getIcon(): RemoteObjectIcon
    {
        return $this->icon;
    }

    /**
     * Details of the icon for the item. If no icon is defined, the default link icon is used in Jira.
     */
    public function setIcon(RemoteObjectIcon $icon): self
    {
        $this->initialized['icon'] = true;
        $this->icon = $icon;

        return $this;
    }

    /**
     * The status of the item.
     */
    public function getStatus(): RemoteObjectStatus
    {
        return $this->status;
    }

    /**
     * The status of the item.
     */
    public function setStatus(RemoteObjectStatus $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }
}
