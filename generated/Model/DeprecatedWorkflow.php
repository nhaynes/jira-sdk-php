<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class DeprecatedWorkflow
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * The scope where this workflow applies.
     *
     * @var DeprecatedWorkflowScope
     */
    protected $scope;
    /**
     * @var bool
     */
    protected $default;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the workflow.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the workflow.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the workflow.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the workflow.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The datetime the workflow was last modified.
     */
    public function getLastModifiedDate(): string
    {
        return $this->lastModifiedDate;
    }

    /**
     * The datetime the workflow was last modified.
     */
    public function setLastModifiedDate(string $lastModifiedDate): self
    {
        $this->initialized['lastModifiedDate'] = true;
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getLastModifiedUser(): string
    {
        return $this->lastModifiedUser;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setLastModifiedUser(string $lastModifiedUser): self
    {
        $this->initialized['lastModifiedUser'] = true;
        $this->lastModifiedUser = $lastModifiedUser;

        return $this;
    }

    /**
     * The account ID of the user that last modified the workflow.
     */
    public function getLastModifiedUserAccountId(): string
    {
        return $this->lastModifiedUserAccountId;
    }

    /**
     * The account ID of the user that last modified the workflow.
     */
    public function setLastModifiedUserAccountId(string $lastModifiedUserAccountId): self
    {
        $this->initialized['lastModifiedUserAccountId'] = true;
        $this->lastModifiedUserAccountId = $lastModifiedUserAccountId;

        return $this;
    }

    /**
     * The number of steps included in the workflow.
     */
    public function getSteps(): int
    {
        return $this->steps;
    }

    /**
     * The number of steps included in the workflow.
     */
    public function setSteps(int $steps): self
    {
        $this->initialized['steps'] = true;
        $this->steps = $steps;

        return $this;
    }

    /**
     * The scope where this workflow applies.
     */
    public function getScope(): DeprecatedWorkflowScope
    {
        return $this->scope;
    }

    /**
     * The scope where this workflow applies.
     */
    public function setScope(DeprecatedWorkflowScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    public function getDefault(): bool
    {
        return $this->default;
    }

    public function setDefault(bool $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;

        return $this;
    }
}
