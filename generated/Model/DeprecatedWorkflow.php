<?php

namespace JiraSdk\Model;

class DeprecatedWorkflow
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
     * The name of the workflow.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the workflow.
     *
     * @var string
     */
    protected $description;
    /**
     * The datetime the workflow was last modified.
     *
     * @var string
     */
    protected $lastModifiedDate;
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $lastModifiedUser;
    /**
     * The account ID of the user that last modified the workflow.
     *
     * @var string
     */
    protected $lastModifiedUserAccountId;
    /**
     * The number of steps included in the workflow.
     *
     * @var int
     */
    protected $steps;
    /**
     * The scope where this workflow applies
     *
     * @var DeprecatedWorkflowScope
     */
    protected $scope;
    /**
     *
     *
     * @var bool
     */
    protected $default;
    /**
     * The name of the workflow.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the workflow.
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
     * The description of the workflow.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the workflow.
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
     * The datetime the workflow was last modified.
     *
     * @return string
     */
    public function getLastModifiedDate(): string
    {
        return $this->lastModifiedDate;
    }
    /**
     * The datetime the workflow was last modified.
     *
     * @param string $lastModifiedDate
     *
     * @return self
     */
    public function setLastModifiedDate(string $lastModifiedDate): self
    {
        $this->initialized['lastModifiedDate'] = true;
        $this->lastModifiedDate = $lastModifiedDate;
        return $this;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @return string
     */
    public function getLastModifiedUser(): string
    {
        return $this->lastModifiedUser;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @param string $lastModifiedUser
     *
     * @return self
     */
    public function setLastModifiedUser(string $lastModifiedUser): self
    {
        $this->initialized['lastModifiedUser'] = true;
        $this->lastModifiedUser = $lastModifiedUser;
        return $this;
    }
    /**
     * The account ID of the user that last modified the workflow.
     *
     * @return string
     */
    public function getLastModifiedUserAccountId(): string
    {
        return $this->lastModifiedUserAccountId;
    }
    /**
     * The account ID of the user that last modified the workflow.
     *
     * @param string $lastModifiedUserAccountId
     *
     * @return self
     */
    public function setLastModifiedUserAccountId(string $lastModifiedUserAccountId): self
    {
        $this->initialized['lastModifiedUserAccountId'] = true;
        $this->lastModifiedUserAccountId = $lastModifiedUserAccountId;
        return $this;
    }
    /**
     * The number of steps included in the workflow.
     *
     * @return int
     */
    public function getSteps(): int
    {
        return $this->steps;
    }
    /**
     * The number of steps included in the workflow.
     *
     * @param int $steps
     *
     * @return self
     */
    public function setSteps(int $steps): self
    {
        $this->initialized['steps'] = true;
        $this->steps = $steps;
        return $this;
    }
    /**
     * The scope where this workflow applies
     *
     * @return DeprecatedWorkflowScope
     */
    public function getScope(): DeprecatedWorkflowScope
    {
        return $this->scope;
    }
    /**
     * The scope where this workflow applies
     *
     * @param DeprecatedWorkflowScope $scope
     *
     * @return self
     */
    public function setScope(DeprecatedWorkflowScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getDefault(): bool
    {
        return $this->default;
    }
    /**
     *
     *
     * @param bool $default
     *
     * @return self
     */
    public function setDefault(bool $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;
        return $this;
    }
}
