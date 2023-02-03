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

class ProjectInsight
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Total issue count.
     *
     * @var int
     */
    protected $totalIssueCount;
    /**
     * The last issue update time.
     *
     * @var \DateTime
     */
    protected $lastIssueUpdateTime;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Total issue count.
     */
    public function getTotalIssueCount(): int
    {
        return $this->totalIssueCount;
    }

    /**
     * Total issue count.
     */
    public function setTotalIssueCount(int $totalIssueCount): self
    {
        $this->initialized['totalIssueCount'] = true;
        $this->totalIssueCount = $totalIssueCount;

        return $this;
    }

    /**
     * The last issue update time.
     */
    public function getLastIssueUpdateTime(): \DateTime
    {
        return $this->lastIssueUpdateTime;
    }

    /**
     * The last issue update time.
     */
    public function setLastIssueUpdateTime(\DateTime $lastIssueUpdateTime): self
    {
        $this->initialized['lastIssueUpdateTime'] = true;
        $this->lastIssueUpdateTime = $lastIssueUpdateTime;

        return $this;
    }
}
