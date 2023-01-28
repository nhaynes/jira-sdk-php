<?php

namespace JiraSdk\Model;

class FieldDetailsSchema extends \ArrayObject
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
     * The data type of the field.
     *
     * @var string
     */
    protected $type;
    /**
     * When the data type is an array, the name of the field items within the array.
     *
     * @var string
     */
    protected $items;
    /**
     * If the field is a system field, the name of the field.
     *
     * @var string
     */
    protected $system;
    /**
     * If the field is a custom field, the URI of the field.
     *
     * @var string
     */
    protected $custom;
    /**
     * If the field is a custom field, the custom ID of the field.
     *
     * @var int
     */
    protected $customId;
    /**
     * If the field is a custom field, the configuration of the field.
     *
     * @var mixed[]
     */
    protected $configuration;
    /**
     * The data type of the field.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The data type of the field.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * When the data type is an array, the name of the field items within the array.
     *
     * @return string
     */
    public function getItems(): string
    {
        return $this->items;
    }
    /**
     * When the data type is an array, the name of the field items within the array.
     *
     * @param string $items
     *
     * @return self
     */
    public function setItems(string $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
    /**
     * If the field is a system field, the name of the field.
     *
     * @return string
     */
    public function getSystem(): string
    {
        return $this->system;
    }
    /**
     * If the field is a system field, the name of the field.
     *
     * @param string $system
     *
     * @return self
     */
    public function setSystem(string $system): self
    {
        $this->initialized['system'] = true;
        $this->system = $system;
        return $this;
    }
    /**
     * If the field is a custom field, the URI of the field.
     *
     * @return string
     */
    public function getCustom(): string
    {
        return $this->custom;
    }
    /**
     * If the field is a custom field, the URI of the field.
     *
     * @param string $custom
     *
     * @return self
     */
    public function setCustom(string $custom): self
    {
        $this->initialized['custom'] = true;
        $this->custom = $custom;
        return $this;
    }
    /**
     * If the field is a custom field, the custom ID of the field.
     *
     * @return int
     */
    public function getCustomId(): int
    {
        return $this->customId;
    }
    /**
     * If the field is a custom field, the custom ID of the field.
     *
     * @param int $customId
     *
     * @return self
     */
    public function setCustomId(int $customId): self
    {
        $this->initialized['customId'] = true;
        $this->customId = $customId;
        return $this;
    }
    /**
     * If the field is a custom field, the configuration of the field.
     *
     * @return mixed[]
     */
    public function getConfiguration(): iterable
    {
        return $this->configuration;
    }
    /**
     * If the field is a custom field, the configuration of the field.
     *
     * @param mixed[] $configuration
     *
     * @return self
     */
    public function setConfiguration(iterable $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;
        return $this;
    }
}
