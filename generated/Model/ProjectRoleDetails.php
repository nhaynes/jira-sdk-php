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

class ProjectRoleDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL the project role details.
     *
     * @var string
     */
    protected $self;
    /**
     * The name of the project role.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the project role.
     *
     * @var int
     */
    protected $id;
    /**
     * The description of the project role.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether this role is the admin role for the project.
     *
     * @var bool
     */
    protected $admin;
    /**
     * The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO).
     *
     * @var ProjectRoleDetailsScope
     */
    protected $scope;
    /**
     * Whether the roles are configurable for this project.
     *
     * @var bool
     */
    protected $roleConfigurable;
    /**
     * The translated name of the project role.
     *
     * @var string
     */
    protected $translatedName;
    /**
     * Whether this role is the default role for the project.
     *
     * @var bool
     */
    protected $default;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL the project role details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL the project role details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The name of the project role.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the project role.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The ID of the project role.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the project role.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the project role.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the project role.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Whether this role is the admin role for the project.
     */
    public function getAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * Whether this role is the admin role for the project.
     */
    public function setAdmin(bool $admin): self
    {
        $this->initialized['admin'] = true;
        $this->admin = $admin;

        return $this;
    }

    /**
     * The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO).
     */
    public function getScope(): ProjectRoleDetailsScope
    {
        return $this->scope;
    }

    /**
     * The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO).
     */
    public function setScope(ProjectRoleDetailsScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Whether the roles are configurable for this project.
     */
    public function getRoleConfigurable(): bool
    {
        return $this->roleConfigurable;
    }

    /**
     * Whether the roles are configurable for this project.
     */
    public function setRoleConfigurable(bool $roleConfigurable): self
    {
        $this->initialized['roleConfigurable'] = true;
        $this->roleConfigurable = $roleConfigurable;

        return $this;
    }

    /**
     * The translated name of the project role.
     */
    public function getTranslatedName(): string
    {
        return $this->translatedName;
    }

    /**
     * The translated name of the project role.
     */
    public function setTranslatedName(string $translatedName): self
    {
        $this->initialized['translatedName'] = true;
        $this->translatedName = $translatedName;

        return $this;
    }

    /**
     * Whether this role is the default role for the project.
     */
    public function getDefault(): bool
    {
        return $this->default;
    }

    /**
     * Whether this role is the default role for the project.
     */
    public function setDefault(bool $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;

        return $this;
    }
}
