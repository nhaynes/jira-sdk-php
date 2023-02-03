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

class IconBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of a 16x16 pixel icon.
     *
     * @var string
     */
    protected $url16x16;
    /**
     * The title of the icon, for use as a tooltip on the icon.
     *
     * @var string
     */
    protected $title;
    /**
     * The URL of the tooltip, used only for a status icon.
     *
     * @var string
     */
    protected $link;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of a 16x16 pixel icon.
     */
    public function getUrl16x16(): string
    {
        return $this->url16x16;
    }

    /**
     * The URL of a 16x16 pixel icon.
     */
    public function setUrl16x16(string $url16x16): self
    {
        $this->initialized['url16x16'] = true;
        $this->url16x16 = $url16x16;

        return $this;
    }

    /**
     * The title of the icon, for use as a tooltip on the icon.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * The title of the icon, for use as a tooltip on the icon.
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * The URL of the tooltip, used only for a status icon.
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * The URL of the tooltip, used only for a status icon.
     */
    public function setLink(string $link): self
    {
        $this->initialized['link'] = true;
        $this->link = $link;

        return $this;
    }
}
