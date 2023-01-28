<?php

namespace JiraSdk\Model;

class JiraStatus
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
     * The ID of the status.
     *
     * @var string
     */
    protected $id;
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
     * The scope of the status.
     *
     * @var StatusScope
     */
    protected $scope;
    /**
     * The description of the status.
     *
     * @var string
     */
    protected $description;
    /**
     * Projects and issue types where the status is used. Only available if the `usages` expand is requested.
     *
     * @var ProjectIssueTypes[]
     */
    protected $usages;
    /**
     * The ID of the status.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the status.
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
     * The scope of the status.
     *
     * @return StatusScope
     */
    public function getScope(): StatusScope
    {
        return $this->scope;
    }
    /**
     * The scope of the status.
     *
     * @param StatusScope $scope
     *
     * @return self
     */
    public function setScope(StatusScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
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
    /**
     * Projects and issue types where the status is used. Only available if the `usages` expand is requested.
     *
     * @return ProjectIssueTypes[]
     */
    public function getUsages(): array
    {
        return $this->usages;
    }
    /**
     * Projects and issue types where the status is used. Only available if the `usages` expand is requested.
     *
     * @param ProjectIssueTypes[] $usages
     *
     * @return self
     */
    public function setUsages(array $usages): self
    {
        $this->initialized['usages'] = true;
        $this->usages = $usages;
        return $this;
    }
}
