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

class IssueList
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of issue IDs.
     *
     * @var string[]
     */
    protected $issueIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of issue IDs.
     *
     * @return string[]
     */
    public function getIssueIds(): array
    {
        return $this->issueIds;
    }

    /**
     * The list of issue IDs.
     *
     * @param string[] $issueIds
     */
    public function setIssueIds(array $issueIds): self
    {
        $this->initialized['issueIds'] = true;
        $this->issueIds = $issueIds;

        return $this;
    }
}
