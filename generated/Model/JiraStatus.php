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

class JiraStatus
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the status.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the status.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the status.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the status.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The category of the status.
     */
    public function getStatusCategory(): string
    {
        return $this->statusCategory;
    }

    /**
     * The category of the status.
     */
    public function setStatusCategory(string $statusCategory): self
    {
        $this->initialized['statusCategory'] = true;
        $this->statusCategory = $statusCategory;

        return $this;
    }

    /**
     * The scope of the status.
     */
    public function getScope(): StatusScope
    {
        return $this->scope;
    }

    /**
     * The scope of the status.
     */
    public function setScope(StatusScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * The description of the status.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the status.
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
     */
    public function setUsages(array $usages): self
    {
        $this->initialized['usages'] = true;
        $this->usages = $usages;

        return $this;
    }
}
