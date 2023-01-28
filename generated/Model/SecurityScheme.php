<?php

namespace JiraSdk\Model;

class SecurityScheme
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
     * The URL of the issue security scheme.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the issue security scheme.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the issue security scheme.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue security scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The ID of the default security level.
     *
     * @var int
     */
    protected $defaultSecurityLevelId;
    /**
     *
     *
     * @var SecurityLevel[]
     */
    protected $levels;
    /**
     * The URL of the issue security scheme.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the issue security scheme.
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
     * The ID of the issue security scheme.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the issue security scheme.
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
     * The name of the issue security scheme.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue security scheme.
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
     * The description of the issue security scheme.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue security scheme.
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
     * The ID of the default security level.
     *
     * @return int
     */
    public function getDefaultSecurityLevelId(): int
    {
        return $this->defaultSecurityLevelId;
    }
    /**
     * The ID of the default security level.
     *
     * @param int $defaultSecurityLevelId
     *
     * @return self
     */
    public function setDefaultSecurityLevelId(int $defaultSecurityLevelId): self
    {
        $this->initialized['defaultSecurityLevelId'] = true;
        $this->defaultSecurityLevelId = $defaultSecurityLevelId;
        return $this;
    }
    /**
     *
     *
     * @return SecurityLevel[]
     */
    public function getLevels(): array
    {
        return $this->levels;
    }
    /**
     *
     *
     * @param SecurityLevel[] $levels
     *
     * @return self
     */
    public function setLevels(array $levels): self
    {
        $this->initialized['levels'] = true;
        $this->levels = $levels;
        return $this;
    }
}
