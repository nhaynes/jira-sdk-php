<?php

namespace JiraSdk\Model;

class JqlQueryField
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
     * The name of the field.
     *
     * @var string
     */
    protected $name;
    /**
     * When the field refers to a value in an entity property, details of the entity property value.
     *
     * @var JqlQueryFieldEntityProperty[]
     */
    protected $property;
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
     * When the field refers to a value in an entity property, details of the entity property value.
     *
     * @return JqlQueryFieldEntityProperty[]
     */
    public function getProperty(): array
    {
        return $this->property;
    }
    /**
     * When the field refers to a value in an entity property, details of the entity property value.
     *
     * @param JqlQueryFieldEntityProperty[] $property
     *
     * @return self
     */
    public function setProperty(array $property): self
    {
        $this->initialized['property'] = true;
        $this->property = $property;
        return $this;
    }
}
