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

class ComponentIssuesCount
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL for this count of issues for a component.
     *
     * @var string
     */
    protected $self;
    /**
     * The count of issues assigned to a component.
     *
     * @var int
     */
    protected $issueCount;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL for this count of issues for a component.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL for this count of issues for a component.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The count of issues assigned to a component.
     */
    public function getIssueCount(): int
    {
        return $this->issueCount;
    }

    /**
     * The count of issues assigned to a component.
     */
    public function setIssueCount(int $issueCount): self
    {
        $this->initialized['issueCount'] = true;
        $this->issueCount = $issueCount;

        return $this;
    }
}
