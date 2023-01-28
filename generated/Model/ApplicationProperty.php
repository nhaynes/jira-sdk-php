<?php

namespace JiraSdk\Model;

class ApplicationProperty
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
     * The ID of the application property. The ID and key are the same.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the application property. The ID and key are the same.
     *
     * @var string
     */
    protected $key;
    /**
     * The new value.
     *
     * @var string
     */
    protected $value;
    /**
     * The name of the application property.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the application property.
     *
     * @var string
     */
    protected $desc;
    /**
     * The data type of the application property.
     *
     * @var string
     */
    protected $type;
    /**
     * The default value of the application property.
     *
     * @var string
     */
    protected $defaultValue;
    /**
     *
     *
     * @var string
     */
    protected $example;
    /**
     * The allowed values, if applicable.
     *
     * @var string[]
     */
    protected $allowedValues;
    /**
     * The ID of the application property. The ID and key are the same.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the application property. The ID and key are the same.
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
     * The key of the application property. The ID and key are the same.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the application property. The ID and key are the same.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The new value.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * The new value.
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
     * The name of the application property.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the application property.
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
     * The description of the application property.
     *
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }
    /**
     * The description of the application property.
     *
     * @param string $desc
     *
     * @return self
     */
    public function setDesc(string $desc): self
    {
        $this->initialized['desc'] = true;
        $this->desc = $desc;
        return $this;
    }
    /**
     * The data type of the application property.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The data type of the application property.
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
     * The default value of the application property.
     *
     * @return string
     */
    public function getDefaultValue(): string
    {
        return $this->defaultValue;
    }
    /**
     * The default value of the application property.
     *
     * @param string $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getExample(): string
    {
        return $this->example;
    }
    /**
     *
     *
     * @param string $example
     *
     * @return self
     */
    public function setExample(string $example): self
    {
        $this->initialized['example'] = true;
        $this->example = $example;
        return $this;
    }
    /**
     * The allowed values, if applicable.
     *
     * @return string[]
     */
    public function getAllowedValues(): array
    {
        return $this->allowedValues;
    }
    /**
     * The allowed values, if applicable.
     *
     * @param string[] $allowedValues
     *
     * @return self
     */
    public function setAllowedValues(array $allowedValues): self
    {
        $this->initialized['allowedValues'] = true;
        $this->allowedValues = $allowedValues;
        return $this;
    }
}
