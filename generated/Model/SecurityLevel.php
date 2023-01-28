<?php

namespace JiraSdk\Model;

class SecurityLevel
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
     * The URL of the issue level security item.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the issue level security item.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the issue level security item.
     *
     * @var string
     */
    protected $description;
    /**
     * The name of the issue level security item.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether the issue level security item is the default.
     *
     * @var bool
     */
    protected $isDefault;
    /**
     * The ID of the issue level security scheme.
     *
     * @var string
     */
    protected $issueSecuritySchemeId;
    /**
     * The URL of the issue level security item.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the issue level security item.
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
     * The ID of the issue level security item.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the issue level security item.
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
     * The description of the issue level security item.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue level security item.
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
     * The name of the issue level security item.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue level security item.
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
     * Whether the issue level security item is the default.
     *
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }
    /**
     * Whether the issue level security item is the default.
     *
     * @param bool $isDefault
     *
     * @return self
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;
        return $this;
    }
    /**
     * The ID of the issue level security scheme.
     *
     * @return string
     */
    public function getIssueSecuritySchemeId(): string
    {
        return $this->issueSecuritySchemeId;
    }
    /**
     * The ID of the issue level security scheme.
     *
     * @param string $issueSecuritySchemeId
     *
     * @return self
     */
    public function setIssueSecuritySchemeId(string $issueSecuritySchemeId): self
    {
        $this->initialized['issueSecuritySchemeId'] = true;
        $this->issueSecuritySchemeId = $issueSecuritySchemeId;
        return $this;
    }
}
