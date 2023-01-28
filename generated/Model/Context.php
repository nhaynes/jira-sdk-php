<?php

namespace JiraSdk\Model;

class Context
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
     * The ID of the context.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the context.
     *
     * @var string
     */
    protected $name;
    /**
     * The scope of the context.
     *
     * @var ContextScope
     */
    protected $scope;
    /**
     * The ID of the context.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the context.
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
     * The name of the context.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the context.
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
     * The scope of the context.
     *
     * @return ContextScope
     */
    public function getScope(): ContextScope
    {
        return $this->scope;
    }
    /**
     * The scope of the context.
     *
     * @param ContextScope $scope
     *
     * @return self
     */
    public function setScope(ContextScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
}