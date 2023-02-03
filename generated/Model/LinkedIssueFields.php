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

class LinkedIssueFields extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The summary description of the linked issue.
     *
     * @var string
     */
    protected $summary;
    /**
     * The status of the linked issue.
     *
     * @var FieldsStatus
     */
    protected $status;
    /**
     * The priority of the linked issue.
     *
     * @var FieldsPriority
     */
    protected $priority;
    /**
     * The assignee of the linked issue.
     *
     * @var FieldsAssignee
     */
    protected $assignee;
    /**
     * The time tracking of the linked issue.
     *
     * @var FieldsTimetracking
     */
    protected $timetracking;
    /**
     * Details about an issue type.
     *
     * @var IssueTypeDetails
     */
    protected $issuetype;
    /**
     * The type of the linked issue.
     *
     * @var FieldsIssueType
     */
    protected $issueType2;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The summary description of the linked issue.
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * The summary description of the linked issue.
     */
    public function setSummary(string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;

        return $this;
    }

    /**
     * The status of the linked issue.
     */
    public function getStatus(): FieldsStatus
    {
        return $this->status;
    }

    /**
     * The status of the linked issue.
     */
    public function setStatus(FieldsStatus $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * The priority of the linked issue.
     */
    public function getPriority(): FieldsPriority
    {
        return $this->priority;
    }

    /**
     * The priority of the linked issue.
     */
    public function setPriority(FieldsPriority $priority): self
    {
        $this->initialized['priority'] = true;
        $this->priority = $priority;

        return $this;
    }

    /**
     * The assignee of the linked issue.
     */
    public function getAssignee(): FieldsAssignee
    {
        return $this->assignee;
    }

    /**
     * The assignee of the linked issue.
     */
    public function setAssignee(FieldsAssignee $assignee): self
    {
        $this->initialized['assignee'] = true;
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * The time tracking of the linked issue.
     */
    public function getTimetracking(): FieldsTimetracking
    {
        return $this->timetracking;
    }

    /**
     * The time tracking of the linked issue.
     */
    public function setTimetracking(FieldsTimetracking $timetracking): self
    {
        $this->initialized['timetracking'] = true;
        $this->timetracking = $timetracking;

        return $this;
    }

    /**
     * Details about an issue type.
     */
    public function getIssuetype(): IssueTypeDetails
    {
        return $this->issuetype;
    }

    /**
     * Details about an issue type.
     */
    public function setIssuetype(IssueTypeDetails $issuetype): self
    {
        $this->initialized['issuetype'] = true;
        $this->issuetype = $issuetype;

        return $this;
    }

    /**
     * The type of the linked issue.
     */
    public function getIssueType2(): FieldsIssueType
    {
        return $this->issueType2;
    }

    /**
     * The type of the linked issue.
     */
    public function setIssueType2(FieldsIssueType $issueType2): self
    {
        $this->initialized['issueType2'] = true;
        $this->issueType2 = $issueType2;

        return $this;
    }
}
