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

class IssueTypeToContextMapping
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
    protected $contextId;
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * Whether the context is mapped to any issue type.
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
    public function getContextId(): string
    {
        return $this->contextId;
    }

    /**
     * The ID of the context.
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;

        return $this;
    }

    /**
     * The ID of the issue type.
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }

    /**
     * The ID of the issue type.
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;

        return $this;
    }

    /**
     * Whether the context is mapped to any issue type.
     */
    public function getIsAnyIssueType(): bool
    {
        return $this->isAnyIssueType;
    }

    /**
     * Whether the context is mapped to any issue type.
     */
    public function setIsAnyIssueType(bool $isAnyIssueType): self
    {
        $this->initialized['isAnyIssueType'] = true;
        $this->isAnyIssueType = $isAnyIssueType;

        return $this;
    }
}
