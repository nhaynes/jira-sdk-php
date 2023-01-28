<?php

namespace JiraSdk\Model;

class ResolutionJsonBean
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
     *
     *
     * @var string
     */
    protected $self;
    /**
     *
     *
     * @var string
     */
    protected $id;
    /**
     *
     *
     * @var string
     */
    protected $description;
    /**
     *
     *
     * @var string
     */
    protected $iconUrl;
    /**
     *
     *
     * @var string
     */
    protected $name;
    /**
     *
     *
     * @var bool
     */
    protected $default;
    /**
     *
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     *
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     *
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     *
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }
    /**
     *
     *
     * @param string $iconUrl
     *
     * @return self
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->initialized['iconUrl'] = true;
        $this->iconUrl = $iconUrl;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     *
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getDefault(): bool
    {
        return $this->default;
    }
    /**
     *
     *
     * @param bool $default
     *
     * @return self
     */
    public function setDefault(bool $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;
        return $this;
    }
}
