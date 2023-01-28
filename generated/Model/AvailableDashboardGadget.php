<?php

namespace JiraSdk\Model;

class AvailableDashboardGadget
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
     * The title of the gadget.
     *
     * @var string
     */
    protected $title;
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
