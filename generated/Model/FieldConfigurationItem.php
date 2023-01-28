<?php

namespace JiraSdk\Model;

class FieldConfigurationItem
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
     * The ID of the field within the field configuration.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the field within the field configuration.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the field is hidden in the field configuration.
     *
     * @var bool
     */
    protected $isHidden;
    /**
     * Whether the field is required in the field configuration.
     *
     * @var bool
     */
    protected $isRequired;
    /**
     * The renderer type for the field within the field configuration.
     *
     * @var string
     */
    protected $renderer;
    /**
     * The ID of the field within the field configuration.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the field within the field configuration.
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
     * The description of the field within the field configuration.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the field within the field configuration.
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
     * Whether the field is hidden in the field configuration.
     *
     * @return bool
     */
    public function getIsHidden(): bool
    {
        return $this->isHidden;
    }
    /**
     * Whether the field is hidden in the field configuration.
     *
     * @param bool $isHidden
     *
     * @return self
     */
    public function setIsHidden(bool $isHidden): self
    {
        $this->initialized['isHidden'] = true;
        $this->isHidden = $isHidden;
        return $this;
    }
    /**
     * Whether the field is required in the field configuration.
     *
     * @return bool
     */
    public function getIsRequired(): bool
    {
        return $this->isRequired;
    }
    /**
     * Whether the field is required in the field configuration.
     *
     * @param bool $isRequired
     *
     * @return self
     */
    public function setIsRequired(bool $isRequired): self
    {
        $this->initialized['isRequired'] = true;
        $this->isRequired = $isRequired;
        return $this;
    }
    /**
     * The renderer type for the field within the field configuration.
     *
     * @return string
     */
    public function getRenderer(): string
    {
        return $this->renderer;
    }
    /**
     * The renderer type for the field within the field configuration.
     *
     * @param string $renderer
     *
     * @return self
     */
    public function setRenderer(string $renderer): self
    {
        $this->initialized['renderer'] = true;
        $this->renderer = $renderer;
        return $this;
    }
}
