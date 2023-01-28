<?php

namespace JiraSdk\Model;

class DashboardGadgetUpdateRequest
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
     * The title of the gadget.
     *
     * @var string
     */
    protected $title;
    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     *
     * @var string
     */
    protected $color;
    /**
     * The position of the gadget.
     *
     * @var DashboardGadgetUpdateRequestPosition
     */
    protected $position;
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
     * @return DashboardGadgetUpdateRequestPosition
     */
    public function getPosition(): DashboardGadgetUpdateRequestPosition
    {
        return $this->position;
    }
    /**
     * The position of the gadget.
     *
     * @param DashboardGadgetUpdateRequestPosition $position
     *
     * @return self
     */
    public function setPosition(DashboardGadgetUpdateRequestPosition $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;
        return $this;
    }
}
