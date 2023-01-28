<?php

namespace JiraSdk\Model;

class ProjectCategory
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
     * The URL of the project category.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the project category.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the project category. Required on create, optional on update.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the project category.
     *
     * @var string
     */
    protected $description;
    /**
     * The URL of the project category.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the project category.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The ID of the project category.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the project category.
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
     * The name of the project category. Required on create, optional on update.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the project category. Required on create, optional on update.
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
     * The description of the project category.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the project category.
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
