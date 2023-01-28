<?php

namespace JiraSdk\Model;

class IssueTypeSchemeDetails
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
     * The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`.
     *
     * @var string
     */
    protected $defaultIssueTypeId;
    /**
     * The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required.
     *
     * @var string[]
     */
    protected $issueTypeIds;
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
     * The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`.
     *
     * @return string
     */
    public function getDefaultIssueTypeId(): string
    {
        return $this->defaultIssueTypeId;
    }
    /**
     * The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`.
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
     * The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required.
     *
     * @return string[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }
    /**
     * The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required.
     *
     * @param string[] $issueTypeIds
     *
     * @return self
     */
    public function setIssueTypeIds(array $issueTypeIds): self
    {
        $this->initialized['issueTypeIds'] = true;
        $this->issueTypeIds = $issueTypeIds;
        return $this;
    }
}
