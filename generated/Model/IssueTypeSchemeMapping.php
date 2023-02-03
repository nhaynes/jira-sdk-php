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

class IssueTypeSchemeMapping
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
    protected $issueTypeSchemeId;
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type scheme.
     */
    public function getIssueTypeSchemeId(): string
    {
        return $this->issueTypeSchemeId;
    }

    /**
     * The ID of the issue type scheme.
     */
    public function setIssueTypeSchemeId(string $issueTypeSchemeId): self
    {
        $this->initialized['issueTypeSchemeId'] = true;
        $this->issueTypeSchemeId = $issueTypeSchemeId;

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
}
