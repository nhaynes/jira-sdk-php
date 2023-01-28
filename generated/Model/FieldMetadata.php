<?php

namespace JiraSdk\Model;

class FieldMetadata
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
     * Whether the field is required.
     *
     * @var bool
     */
    protected $required;
    /**
     * The data type of the field.
     *
     * @var FieldMetadataSchema
     */
    protected $schema;
    /**
     * The name of the field.
     *
     * @var string
     */
    protected $name;
    /**
     * The key of the field.
     *
     * @var string
     */
    protected $key;
    /**
     * The URL that can be used to automatically complete the field.
     *
     * @var string
     */
    protected $autoCompleteUrl;
    /**
     * Whether the field has a default value.
     *
     * @var bool
     */
    protected $hasDefaultValue;
    /**
     * The list of operations that can be performed on the field.
     *
     * @var string[]
     */
    protected $operations;
    /**
     * The list of values allowed in the field.
     *
     * @var mixed[]
     */
    protected $allowedValues;
    /**
     * The default value of the field.
     *
     * @var mixed
     */
    protected $defaultValue;
    /**
     * The configuration properties.
     *
     * @var mixed[]
     */
    protected $configuration;
    /**
     * Whether the field is required.
     *
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }
    /**
     * Whether the field is required.
     *
     * @param bool $required
     *
     * @return self
     */
    public function setRequired(bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;
        return $this;
    }
    /**
     * The data type of the field.
     *
     * @return FieldMetadataSchema
     */
    public function getSchema(): FieldMetadataSchema
    {
        return $this->schema;
    }
    /**
     * The data type of the field.
     *
     * @param FieldMetadataSchema $schema
     *
     * @return self
     */
    public function setSchema(FieldMetadataSchema $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;
        return $this;
    }
    /**
     * The name of the field.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the field.
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
     * The key of the field.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the field.
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
     * The URL that can be used to automatically complete the field.
     *
     * @return string
     */
    public function getAutoCompleteUrl(): string
    {
        return $this->autoCompleteUrl;
    }
    /**
     * The URL that can be used to automatically complete the field.
     *
     * @param string $autoCompleteUrl
     *
     * @return self
     */
    public function setAutoCompleteUrl(string $autoCompleteUrl): self
    {
        $this->initialized['autoCompleteUrl'] = true;
        $this->autoCompleteUrl = $autoCompleteUrl;
        return $this;
    }
    /**
     * Whether the field has a default value.
     *
     * @return bool
     */
    public function getHasDefaultValue(): bool
    {
        return $this->hasDefaultValue;
    }
    /**
     * Whether the field has a default value.
     *
     * @param bool $hasDefaultValue
     *
     * @return self
     */
    public function setHasDefaultValue(bool $hasDefaultValue): self
    {
        $this->initialized['hasDefaultValue'] = true;
        $this->hasDefaultValue = $hasDefaultValue;
        return $this;
    }
    /**
     * The list of operations that can be performed on the field.
     *
     * @return string[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }
    /**
     * The list of operations that can be performed on the field.
     *
     * @param string[] $operations
     *
     * @return self
     */
    public function setOperations(array $operations): self
    {
        $this->initialized['operations'] = true;
        $this->operations = $operations;
        return $this;
    }
    /**
     * The list of values allowed in the field.
     *
     * @return mixed[]
     */
    public function getAllowedValues(): array
    {
        return $this->allowedValues;
    }
    /**
     * The list of values allowed in the field.
     *
     * @param mixed[] $allowedValues
     *
     * @return self
     */
    public function setAllowedValues(array $allowedValues): self
    {
        $this->initialized['allowedValues'] = true;
        $this->allowedValues = $allowedValues;
        return $this;
    }
    /**
     * The default value of the field.
     *
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
    /**
     * The default value of the field.
     *
     * @param mixed $defaultValue
     *
     * @return self
     */
    public function setDefaultValue($defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;
        return $this;
    }
    /**
     * The configuration properties.
     *
     * @return mixed[]
     */
    public function getConfiguration(): iterable
    {
        return $this->configuration;
    }
    /**
     * The configuration properties.
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
