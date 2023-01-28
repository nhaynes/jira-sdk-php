<?php

namespace JiraSdk\Model;

class TransitionScreenDetails
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
     * The ID of the screen.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the screen.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the screen.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the screen.
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
     * The name of the screen.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the screen.
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
}
