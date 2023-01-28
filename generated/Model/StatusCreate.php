<?php

namespace JiraSdk\Model;

class StatusCreate
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
     * The name of the status.
     *
     * @var string
     */
    protected $name;
    /**
     * The category of the status.
     *
     * @var string
     */
    protected $statusCategory;
    /**
     * The description of the status.
     *
     * @var string
     */
    protected $description;
    /**
     * The name of the status.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the status.
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
     * The category of the status.
     *
     * @return string
     */
    public function getStatusCategory(): string
    {
        return $this->statusCategory;
    }
    /**
     * The category of the status.
     *
     * @param string $statusCategory
     *
     * @return self
     */
    public function setStatusCategory(string $statusCategory): self
    {
        $this->initialized['statusCategory'] = true;
        $this->statusCategory = $statusCategory;
        return $this;
    }
    /**
     * The description of the status.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the status.
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
