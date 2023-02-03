<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class FieldMetadata
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the field is required.
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * Whether the field is required.
     */
    public function setRequired(bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;

        return $this;
    }

    /**
     * The data type of the field.
     */
    public function getSchema(): FieldMetadataSchema
    {
        return $this->schema;
    }

    /**
     * The data type of the field.
     */
    public function setSchema(FieldMetadataSchema $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;

        return $this;
    }

    /**
     * The name of the field.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the field.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The key of the field.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the field.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The URL that can be used to automatically complete the field.
     */
    public function getAutoCompleteUrl(): string
    {
        return $this->autoCompleteUrl;
    }

    /**
     * The URL that can be used to automatically complete the field.
     */
    public function setAutoCompleteUrl(string $autoCompleteUrl): self
    {
        $this->initialized['autoCompleteUrl'] = true;
        $this->autoCompleteUrl = $autoCompleteUrl;

        return $this;
    }

    /**
     * Whether the field has a default value.
     */
    public function getHasDefaultValue(): bool
    {
        return $this->hasDefaultValue;
    }

    /**
     * Whether the field has a default value.
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
     */
    public function setConfiguration(iterable $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;

        return $this;
    }
}
