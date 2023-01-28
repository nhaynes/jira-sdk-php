<?php

namespace JiraSdk\Model;

class CustomFieldOptionCreate
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
     * The value of the custom field option.
     *
     * @var string
     */
    protected $value;
    /**
     * For cascading options, the ID of the custom field object containing the cascading option.
     *
     * @var string
     */
    protected $optionId;
    /**
     * Whether the option is disabled.
     *
     * @var bool
     */
    protected $disabled;
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
     * For cascading options, the ID of the custom field object containing the cascading option.
     *
     * @return string
     */
    public function getOptionId(): string
    {
        return $this->optionId;
    }
    /**
     * For cascading options, the ID of the custom field object containing the cascading option.
     *
     * @param string $optionId
     *
     * @return self
     */
    public function setOptionId(string $optionId): self
    {
        $this->initialized['optionId'] = true;
        $this->optionId = $optionId;
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
