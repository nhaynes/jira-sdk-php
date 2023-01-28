<?php

namespace JiraSdk\Model;

class IconBean
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
    /**
     * The URL of a 16x16 pixel icon.
     *
     * @return string
     */
    public function getUrl16x16(): string
    {
        return $this->url16x16;
    }
    /**
     * The URL of a 16x16 pixel icon.
     *
     * @param string $url16x16
     *
     * @return self
     */
    public function setUrl16x16(string $url16x16): self
    {
        $this->initialized['url16x16'] = true;
        $this->url16x16 = $url16x16;
        return $this;
    }
    /**
     * The title of the icon, for use as a tooltip on the icon.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * The title of the icon, for use as a tooltip on the icon.
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
     * The URL of the tooltip, used only for a status icon.
     *
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }
    /**
     * The URL of the tooltip, used only for a status icon.
     *
     * @param string $link
     *
     * @return self
     */
    public function setLink(string $link): self
    {
        $this->initialized['link'] = true;
        $this->link = $link;
        return $this;
    }
}
