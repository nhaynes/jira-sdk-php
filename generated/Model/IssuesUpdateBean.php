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

class IssuesUpdateBean extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var IssueUpdateDetails[]
     */
    protected $issueUpdates;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return IssueUpdateDetails[]
     */
    public function getIssueUpdates(): array
    {
        return $this->issueUpdates;
    }

    /**
     * @param IssueUpdateDetails[] $issueUpdates
     */
    public function setIssueUpdates(array $issueUpdates): self
    {
        $this->initialized['issueUpdates'] = true;
        $this->issueUpdates = $issueUpdates;

        return $this;
    }
}
