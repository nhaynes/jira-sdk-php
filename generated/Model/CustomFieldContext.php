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

class CustomFieldContext
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the context.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the context.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the context.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the context is global.
     *
     * @var bool
     */
    protected $isGlobalContext;
    /**
     * Whether the context apply to all issue types.
     *
     * @var bool
     */
    protected $isAnyIssueType;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the context.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the context.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the context.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the context.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the context.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the context.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Whether the context is global.
     */
    public function getIsGlobalContext(): bool
    {
        return $this->isGlobalContext;
    }

    /**
     * Whether the context is global.
     */
    public function setIsGlobalContext(bool $isGlobalContext): self
    {
        $this->initialized['isGlobalContext'] = true;
        $this->isGlobalContext = $isGlobalContext;

        return $this;
    }

    /**
     * Whether the context apply to all issue types.
     */
    public function getIsAnyIssueType(): bool
    {
        return $this->isAnyIssueType;
    }

    /**
     * Whether the context apply to all issue types.
     */
    public function setIsAnyIssueType(bool $isAnyIssueType): self
    {
        $this->initialized['isAnyIssueType'] = true;
        $this->isAnyIssueType = $isAnyIssueType;

        return $this;
    }
}
