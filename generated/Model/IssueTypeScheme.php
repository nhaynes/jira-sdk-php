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

class IssueTypeScheme
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type scheme.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the issue type scheme.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type scheme.
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
     * Whether the issue type scheme is the default.
     *
     * @var bool
     */
    protected $isDefault;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type scheme.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue type scheme.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the issue type scheme.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue type scheme.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the issue type scheme.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue type scheme.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The ID of the default issue type of the issue type scheme.
     */
    public function getDefaultIssueTypeId(): string
    {
        return $this->defaultIssueTypeId;
    }

    /**
     * The ID of the default issue type of the issue type scheme.
     */
    public function setDefaultIssueTypeId(string $defaultIssueTypeId): self
    {
        $this->initialized['defaultIssueTypeId'] = true;
        $this->defaultIssueTypeId = $defaultIssueTypeId;

        return $this;
    }

    /**
     * Whether the issue type scheme is the default.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * Whether the issue type scheme is the default.
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;

        return $this;
    }
}
