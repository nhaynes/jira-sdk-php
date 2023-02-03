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

class Icon extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of an icon that displays at 16x16 pixel in Jira.
     *
     * @var string
     */
    protected $url16x16;
    /**
     * The title of the icon. This is used as follows:
     *  For a status icon it is used as a tooltip on the icon. If not set, the status icon doesn't display a tooltip in Jira.
     *  For the remote object icon it is used in conjunction with the application name to display a tooltip for the link's icon. The tooltip takes the format "\[application name\] icon title". Blank itemsare excluded from the tooltip title. If both items are blank, the icon tooltop displays as "Web Link".
     *
     * @var string
     */
    protected $title;
    /**
     * The URL of the tooltip, used only for a status icon. If not set, the status icon in Jira is not clickable.
     *
     * @var string
     */
    protected $link;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of an icon that displays at 16x16 pixel in Jira.
     */
    public function getUrl16x16(): string
    {
        return $this->url16x16;
    }

    /**
     * The URL of an icon that displays at 16x16 pixel in Jira.
     */
    public function setUrl16x16(string $url16x16): self
    {
        $this->initialized['url16x16'] = true;
        $this->url16x16 = $url16x16;

        return $this;
    }

    /**
     * The title of the icon. This is used as follows:
     *  For a status icon it is used as a tooltip on the icon. If not set, the status icon doesn't display a tooltip in Jira.
     *  For the remote object icon it is used in conjunction with the application name to display a tooltip for the link's icon. The tooltip takes the format "\[application name\] icon title". Blank itemsare excluded from the tooltip title. If both items are blank, the icon tooltop displays as "Web Link".
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * The title of the icon. This is used as follows:
     *  For a status icon it is used as a tooltip on the icon. If not set, the status icon doesn't display a tooltip in Jira.
     *  For the remote object icon it is used in conjunction with the application name to display a tooltip for the link's icon. The tooltip takes the format "\[application name\] icon title". Blank itemsare excluded from the tooltip title. If both items are blank, the icon tooltop displays as "Web Link".
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * The URL of the tooltip, used only for a status icon. If not set, the status icon in Jira is not clickable.
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * The URL of the tooltip, used only for a status icon. If not set, the status icon in Jira is not clickable.
     */
    public function setLink(string $link): self
    {
        $this->initialized['link'] = true;
        $this->link = $link;

        return $this;
    }
}
