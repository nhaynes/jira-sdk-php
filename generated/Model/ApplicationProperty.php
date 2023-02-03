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

class ApplicationProperty
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * @var string
     */
    protected $example;
    /**
     * The allowed values, if applicable.
     *
     * @var string[]
     */
    protected $allowedValues;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the application property. The ID and key are the same.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the application property. The ID and key are the same.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the application property. The ID and key are the same.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the application property. The ID and key are the same.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The new value.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The new value.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The name of the application property.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the application property.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the application property.
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * The description of the application property.
     */
    public function setDesc(string $desc): self
    {
        $this->initialized['desc'] = true;
        $this->desc = $desc;

        return $this;
    }

    /**
     * The data type of the application property.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The data type of the application property.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The default value of the application property.
     */
    public function getDefaultValue(): string
    {
        return $this->defaultValue;
    }

    /**
     * The default value of the application property.
     */
    public function setDefaultValue(string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;

        return $this;
    }

    public function getExample(): string
    {
        return $this->example;
    }

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
     */
    public function setAllowedValues(array $allowedValues): self
    {
        $this->initialized['allowedValues'] = true;
        $this->allowedValues = $allowedValues;

        return $this;
    }
}
