<?php

namespace JiraSdk\Model;

class DashboardGadgetSettings
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
     * The module key of the gadget type. Can't be provided with `uri`.
     *
     * @var string
     */
    protected $moduleKey;
    /**
     * The URI of the gadget type. Can't be provided with `moduleKey`.
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
     * The position of the gadget. When the gadget is placed into the position, other gadgets in the same column are moved down to accommodate it.
     *
     * @var DashboardGadgetSettingsPosition
     */
    protected $position;
    /**
     * The title of the gadget.
     *
     * @var string
     */
    protected $title;
    /**
     * Whether to ignore the validation of module key and URI. For example, when a gadget is created that is a part of an application that isn't installed.
     *
     * @var bool
     */
    protected $ignoreUriAndModuleKeyValidation;
    /**
     * The module key of the gadget type. Can't be provided with `uri`.
     *
     * @return string
     */
    public function getModuleKey(): string
    {
        return $this->moduleKey;
    }
    /**
     * The module key of the gadget type. Can't be provided with `uri`.
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
     * The URI of the gadget type. Can't be provided with `moduleKey`.
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }
    /**
     * The URI of the gadget type. Can't be provided with `moduleKey`.
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
     * The position of the gadget. When the gadget is placed into the position, other gadgets in the same column are moved down to accommodate it.
     *
     * @return DashboardGadgetSettingsPosition
     */
    public function getPosition(): DashboardGadgetSettingsPosition
    {
        return $this->position;
    }
    /**
     * The position of the gadget. When the gadget is placed into the position, other gadgets in the same column are moved down to accommodate it.
     *
     * @param DashboardGadgetSettingsPosition $position
     *
     * @return self
     */
    public function setPosition(DashboardGadgetSettingsPosition $position): self
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
    /**
     * Whether to ignore the validation of module key and URI. For example, when a gadget is created that is a part of an application that isn't installed.
     *
     * @return bool
     */
    public function getIgnoreUriAndModuleKeyValidation(): bool
    {
        return $this->ignoreUriAndModuleKeyValidation;
    }
    /**
     * Whether to ignore the validation of module key and URI. For example, when a gadget is created that is a part of an application that isn't installed.
     *
     * @param bool $ignoreUriAndModuleKeyValidation
     *
     * @return self
     */
    public function setIgnoreUriAndModuleKeyValidation(bool $ignoreUriAndModuleKeyValidation): self
    {
        $this->initialized['ignoreUriAndModuleKeyValidation'] = true;
        $this->ignoreUriAndModuleKeyValidation = $ignoreUriAndModuleKeyValidation;
        return $this;
    }
}
