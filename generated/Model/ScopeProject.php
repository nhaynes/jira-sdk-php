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

class ScopeProject extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the project details.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the project.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the project.
     *
     * @var string
     */
    protected $name;
    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project.
     *
     * @var string
     */
    protected $projectTypeKey;
    /**
     * Whether or not the project is simplified.
     *
     * @var bool
     */
    protected $simplified;
    /**
     * The URLs of the project's avatars.
     *
     * @var ProjectDetailsAvatarUrls
     */
    protected $avatarUrls;
    /**
     * The category the project belongs to.
     *
     * @var ProjectDetailsProjectCategory
     */
    protected $projectCategory;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the project details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the project details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the project.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the project.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the project.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the project.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the project.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the project.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project.
     */
    public function getProjectTypeKey(): string
    {
        return $this->projectTypeKey;
    }

    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project.
     */
    public function setProjectTypeKey(string $projectTypeKey): self
    {
        $this->initialized['projectTypeKey'] = true;
        $this->projectTypeKey = $projectTypeKey;

        return $this;
    }

    /**
     * Whether or not the project is simplified.
     */
    public function getSimplified(): bool
    {
        return $this->simplified;
    }

    /**
     * Whether or not the project is simplified.
     */
    public function setSimplified(bool $simplified): self
    {
        $this->initialized['simplified'] = true;
        $this->simplified = $simplified;

        return $this;
    }

    /**
     * The URLs of the project's avatars.
     */
    public function getAvatarUrls(): ProjectDetailsAvatarUrls
    {
        return $this->avatarUrls;
    }

    /**
     * The URLs of the project's avatars.
     */
    public function setAvatarUrls(ProjectDetailsAvatarUrls $avatarUrls): self
    {
        $this->initialized['avatarUrls'] = true;
        $this->avatarUrls = $avatarUrls;

        return $this;
    }

    /**
     * The category the project belongs to.
     */
    public function getProjectCategory(): ProjectDetailsProjectCategory
    {
        return $this->projectCategory;
    }

    /**
     * The category the project belongs to.
     */
    public function setProjectCategory(ProjectDetailsProjectCategory $projectCategory): self
    {
        $this->initialized['projectCategory'] = true;
        $this->projectCategory = $projectCategory;

        return $this;
    }
}
