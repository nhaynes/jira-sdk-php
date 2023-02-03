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

class VersionUnresolvedIssuesCount
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of these count details.
     *
     * @var string
     */
    protected $self;
    /**
     * Count of unresolved issues.
     *
     * @var int
     */
    protected $issuesUnresolvedCount;
    /**
     * Count of issues.
     *
     * @var int
     */
    protected $issuesCount;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of these count details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of these count details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * Count of unresolved issues.
     */
    public function getIssuesUnresolvedCount(): int
    {
        return $this->issuesUnresolvedCount;
    }

    /**
     * Count of unresolved issues.
     */
    public function setIssuesUnresolvedCount(int $issuesUnresolvedCount): self
    {
        $this->initialized['issuesUnresolvedCount'] = true;
        $this->issuesUnresolvedCount = $issuesUnresolvedCount;

        return $this;
    }

    /**
     * Count of issues.
     */
    public function getIssuesCount(): int
    {
        return $this->issuesCount;
    }

    /**
     * Count of issues.
     */
    public function setIssuesCount(int $issuesCount): self
    {
        $this->initialized['issuesCount'] = true;
        $this->issuesCount = $issuesCount;

        return $this;
    }
}
