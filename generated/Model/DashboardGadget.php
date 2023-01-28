<?php

namespace JiraSdk\Model;

class DashboardGadget
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
     * The ID of the gadget instance.
     *
     * @var int
     */
    protected $id;
    /**
     * The module key of the gadget type.
     *
     * @var string
     */
    protected $moduleKey;
    /**
     * The URI of the gadget type.
     *
     * @var string
     */
    protected $uri;
    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     *
     * @var string
     */
    protected $color;
    /**
     * The position of the gadget.
     *
     * @var DashboardGadgetPosition
     */
    protected $position;
    /**
     * The title of the gadget.
     *
     * @var string
     */
    protected $title;
    /**
     * The ID of the gadget instance.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the gadget instance.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The module key of the gadget type.
     *
     * @return string
     */
    public function getModuleKey(): string
    {
        return $this->moduleKey;
    }
    /**
     * The module key of the gadget type.
     *
     * @param string $moduleKey
     *
     * @return self
     */
    public function setModuleKey(string $moduleKey): self
    {
        $this->initialized['moduleKey'] = true;
        $this->moduleKey = $moduleKey;
        return $this;
    }
    /**
     * The URI of the gadget type.
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }
    /**
     * The URI of the gadget type.
     *
     * @param string $uri
     *
     * @return self
     */
    public function setUri(string $uri): self
    {
        $this->initialized['uri'] = true;
        $this->uri = $uri;
        return $this;
    }
    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     *
     * @param string $color
     *
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->initialized['color'] = true;
        $this->color = $color;
        return $this;
    }
    /**
     * The position of the gadget.
     *
     * @return DashboardGadgetPosition
     */
    public function getPosition(): DashboardGadgetPosition
    {
        return $this->position;
    }
    /**
     * The position of the gadget.
     *
     * @param DashboardGadgetPosition $position
     *
     * @return self
     */
    public function setPosition(DashboardGadgetPosition $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;
        return $this;
    }
    /**
     * The title of the gadget.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * The title of the gadget.
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
}
