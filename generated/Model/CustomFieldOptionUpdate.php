<?php

namespace JiraSdk\Model;

class CustomFieldOptionUpdate
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
     * The ID of the custom field option.
     *
     * @var string
     */
    protected $id;
    /**
     * The value of the custom field option.
     *
     * @var string
     */
    protected $value;
    /**
     * Whether the option is disabled.
     *
     * @var bool
     */
    protected $disabled;
    /**
     * The ID of the custom field option.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the custom field option.
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
     * The value of the custom field option.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * The value of the custom field option.
     *
     * @param string $value
     *
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * Whether the option is disabled.
     *
     * @return bool
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }
    /**
     * Whether the option is disabled.
     *
     * @param bool $disabled
     *
     * @return self
     */
    public function setDisabled(bool $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;
        return $this;
    }
}
