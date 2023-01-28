<?php

namespace JiraSdk\Model;

class IssueTypeSchemeUpdateDetails
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
     * The name of the issue type scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type scheme. The maximum length is 4000 characters.
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
     * The name of the issue type scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue type scheme. The name must be unique. The maximum length is 255 characters.
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
     * The description of the issue type scheme. The maximum length is 4000 characters.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue type scheme. The maximum length is 4000 characters.
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
}
