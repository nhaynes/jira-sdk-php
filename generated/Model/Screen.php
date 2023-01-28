<?php

namespace JiraSdk\Model;

class Screen
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
     * @var int
     */
    protected $id;
    /**
     * The name of the screen.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the screen.
     *
     * @var string
     */
    protected $description;
    /**
     * The scope of the screen.
     *
     * @var ScreenScope
     */
    protected $scope;
    /**
     * The ID of the screen.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the screen.
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
    /**
     * The description of the screen.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the screen.
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
    /**
     * The scope of the screen.
     *
     * @return ScreenScope
     */
    public function getScope(): ScreenScope
    {
        return $this->scope;
    }
    /**
     * The scope of the screen.
     *
     * @param ScreenScope $scope
     *
     * @return self
     */
    public function setScope(ScreenScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
}
