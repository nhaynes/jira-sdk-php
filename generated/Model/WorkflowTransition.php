<?php

namespace JiraSdk\Model;

class WorkflowTransition
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
     * The transition ID.
     *
     * @var int
     */
    protected $id;
    /**
     * The transition name.
     *
     * @var string
     */
    protected $name;
    /**
     * The transition ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The transition ID.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The transition name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The transition name.
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
