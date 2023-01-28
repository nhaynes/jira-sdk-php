<?php

namespace JiraSdk\Model;

class CreateResolutionDetails extends \ArrayObject
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
     * The name of the resolution. Must be unique (case-insensitive).
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the resolution.
     *
     * @var string
     */
    protected $description;
    /**
     * The name of the resolution. Must be unique (case-insensitive).
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the resolution. Must be unique (case-insensitive).
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
     * The description of the resolution.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the resolution.
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
}
