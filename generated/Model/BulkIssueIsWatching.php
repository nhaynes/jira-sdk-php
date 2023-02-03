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

class BulkIssueIsWatching
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The map of issue ID to boolean watch status.
     *
     * @var bool[]
     */
    protected $issuesIsWatching;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The map of issue ID to boolean watch status.
     *
     * @return bool[]
     */
    public function getIssuesIsWatching(): iterable
    {
        return $this->issuesIsWatching;
    }

    /**
     * The map of issue ID to boolean watch status.
     *
     * @param bool[] $issuesIsWatching
     */
    public function setIssuesIsWatching(iterable $issuesIsWatching): self
    {
        $this->initialized['issuesIsWatching'] = true;
        $this->issuesIsWatching = $issuesIsWatching;

        return $this;
    }
}
