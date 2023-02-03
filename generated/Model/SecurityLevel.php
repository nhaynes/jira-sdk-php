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

class SecurityLevel
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the issue level security item.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the issue level security item.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the issue level security item.
     *
     * @var string
     */
    protected $description;
    /**
     * The name of the issue level security item.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether the issue level security item is the default.
     *
     * @var bool
     */
    protected $isDefault;
    /**
     * The ID of the issue level security scheme.
     *
     * @var string
     */
    protected $issueSecuritySchemeId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the issue level security item.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue level security item.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the issue level security item.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue level security item.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the issue level security item.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue level security item.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The name of the issue level security item.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue level security item.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Whether the issue level security item is the default.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * Whether the issue level security item is the default.
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * The ID of the issue level security scheme.
     */
    public function getIssueSecuritySchemeId(): string
    {
        return $this->issueSecuritySchemeId;
    }

    /**
     * The ID of the issue level security scheme.
     */
    public function setIssueSecuritySchemeId(string $issueSecuritySchemeId): self
    {
        $this->initialized['issueSecuritySchemeId'] = true;
        $this->issueSecuritySchemeId = $issueSecuritySchemeId;

        return $this;
    }
}
