<?php

namespace JiraSdk\Model;

class FieldsPriority extends \ArrayObject
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
     * The URL of the issue priority.
     *
     * @var string
     */
    protected $self;
    /**
     * The color used to indicate the issue priority.
     *
     * @var string
     */
    protected $statusColor;
    /**
     * The description of the issue priority.
     *
     * @var string
     */
    protected $description;
    /**
     * The URL of the icon for the issue priority.
     *
     * @var string
     */
    protected $iconUrl;
    /**
     * The name of the issue priority.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the issue priority.
     *
     * @var string
     */
    protected $id;
    /**
     * Whether this priority is the default.
     *
     * @var bool
     */
    protected $isDefault;
    /**
     * The URL of the issue priority.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the issue priority.
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
     * The color used to indicate the issue priority.
     *
     * @return string
     */
    public function getStatusColor(): string
    {
        return $this->statusColor;
    }
    /**
     * The color used to indicate the issue priority.
     *
     * @param string $statusColor
     *
     * @return self
     */
    public function setStatusColor(string $statusColor): self
    {
        $this->initialized['statusColor'] = true;
        $this->statusColor = $statusColor;
        return $this;
    }
    /**
     * The description of the issue priority.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue priority.
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
     * The URL of the icon for the issue priority.
     *
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }
    /**
     * The URL of the icon for the issue priority.
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
     * The name of the issue priority.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue priority.
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
     * The ID of the issue priority.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the issue priority.
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
     * Whether this priority is the default.
     *
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }
    /**
     * Whether this priority is the default.
     *
     * @param bool $isDefault
     *
     * @return self
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;
        return $this;
    }
}
