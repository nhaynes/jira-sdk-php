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

class IssuesAndJQLQueries
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of JQL queries.
     *
     * @var string[]
     */
    protected $jqls;
    /**
     * A list of issue IDs.
     *
     * @var int[]
     */
    protected $issueIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of JQL queries.
     *
     * @return string[]
     */
    public function getJqls(): array
    {
        return $this->jqls;
    }

    /**
     * A list of JQL queries.
     *
     * @param string[] $jqls
     */
    public function setJqls(array $jqls): self
    {
        $this->initialized['jqls'] = true;
        $this->jqls = $jqls;

        return $this;
    }

    /**
     * A list of issue IDs.
     *
     * @return int[]
     */
    public function getIssueIds(): array
    {
        return $this->issueIds;
    }

    /**
     * A list of issue IDs.
     *
     * @param int[] $issueIds
     */
    public function setIssueIds(array $issueIds): self
    {
        $this->initialized['issueIds'] = true;
        $this->issueIds = $issueIds;

        return $this;
    }
}
