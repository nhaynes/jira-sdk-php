<?php

namespace JiraSdk\Model;

class IssueTypeSchemeProjectsIssueTypeScheme extends \ArrayObject
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
     * The ID of the issue type scheme.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the issue type scheme.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The ID of the default issue type of the issue type scheme.
     *
     * @var string
     */
    protected $defaultIssueTypeId;
    /**
     * Whether the issue type scheme is the default.
     *
     * @var bool
     */
    protected $isDefault;
    /**
     * The ID of the issue type scheme.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the issue type scheme.
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
     * The name of the issue type scheme.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue type scheme.
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
     * The description of the issue type scheme.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue type scheme.
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
     * The ID of the default issue type of the issue type scheme.
     *
     * @return string
     */
    public function getDefaultIssueTypeId(): string
    {
        return $this->defaultIssueTypeId;
    }
    /**
     * The ID of the default issue type of the issue type scheme.
     *
     * @param string $defaultIssueTypeId
     *
     * @return self
     */
    public function setDefaultIssueTypeId(string $defaultIssueTypeId): self
    {
        $this->initialized['defaultIssueTypeId'] = true;
        $this->defaultIssueTypeId = $defaultIssueTypeId;
        return $this;
    }
    /**
     * Whether the issue type scheme is the default.
     *
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }
    /**
     * Whether the issue type scheme is the default.
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
}
