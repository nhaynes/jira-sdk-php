<?php

namespace JiraSdk\Model;

class CustomFieldContext
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
     * @var string
     */
    protected $id;
    /**
     * The name of the context.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the context.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the context is global.
     *
     * @var bool
     */
    protected $isGlobalContext;
    /**
     * Whether the context apply to all issue types.
     *
     * @var bool
     */
    protected $isAnyIssueType;
    /**
     * The ID of the context.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the context.
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
     * The description of the context.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the context.
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
     * Whether the context is global.
     *
     * @return bool
     */
    public function getIsGlobalContext(): bool
    {
        return $this->isGlobalContext;
    }
    /**
     * Whether the context is global.
     *
     * @param bool $isGlobalContext
     *
     * @return self
     */
    public function setIsGlobalContext(bool $isGlobalContext): self
    {
        $this->initialized['isGlobalContext'] = true;
        $this->isGlobalContext = $isGlobalContext;
        return $this;
    }
    /**
     * Whether the context apply to all issue types.
     *
     * @return bool
     */
    public function getIsAnyIssueType(): bool
    {
        return $this->isAnyIssueType;
    }
    /**
     * Whether the context apply to all issue types.
     *
     * @param bool $isAnyIssueType
     *
     * @return self
     */
    public function setIsAnyIssueType(bool $isAnyIssueType): self
    {
        $this->initialized['isAnyIssueType'] = true;
        $this->isAnyIssueType = $isAnyIssueType;
        return $this;
    }
}
