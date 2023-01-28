<?php

namespace JiraSdk\Model;

class LinkedIssueFields extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
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
    /**
     * The summary description of the linked issue.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }
    /**
     * The summary description of the linked issue.
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary(string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * The status of the linked issue.
     *
     * @return FieldsStatus
     */
    public function getStatus(): FieldsStatus
    {
        return $this->status;
    }
    /**
     * The status of the linked issue.
     *
     * @param FieldsStatus $status
     *
     * @return self
     */
    public function setStatus(FieldsStatus $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * The priority of the linked issue.
     *
     * @return FieldsPriority
     */
    public function getPriority(): FieldsPriority
    {
        return $this->priority;
    }
    /**
     * The priority of the linked issue.
     *
     * @param FieldsPriority $priority
     *
     * @return self
     */
    public function setPriority(FieldsPriority $priority): self
    {
        $this->initialized['priority'] = true;
        $this->priority = $priority;
        return $this;
    }
    /**
     * The assignee of the linked issue.
     *
     * @return FieldsAssignee
     */
    public function getAssignee(): FieldsAssignee
    {
        return $this->assignee;
    }
    /**
     * The assignee of the linked issue.
     *
     * @param FieldsAssignee $assignee
     *
     * @return self
     */
    public function setAssignee(FieldsAssignee $assignee): self
    {
        $this->initialized['assignee'] = true;
        $this->assignee = $assignee;
        return $this;
    }
    /**
     * The time tracking of the linked issue.
     *
     * @return FieldsTimetracking
     */
    public function getTimetracking(): FieldsTimetracking
    {
        return $this->timetracking;
    }
    /**
     * The time tracking of the linked issue.
     *
     * @param FieldsTimetracking $timetracking
     *
     * @return self
     */
    public function setTimetracking(FieldsTimetracking $timetracking): self
    {
        $this->initialized['timetracking'] = true;
        $this->timetracking = $timetracking;
        return $this;
    }
    /**
     * Details about an issue type.
     *
     * @return IssueTypeDetails
     */
    public function getIssuetype(): IssueTypeDetails
    {
        return $this->issuetype;
    }
    /**
     * Details about an issue type.
     *
     * @param IssueTypeDetails $issuetype
     *
     * @return self
     */
    public function setIssuetype(IssueTypeDetails $issuetype): self
    {
        $this->initialized['issuetype'] = true;
        $this->issuetype = $issuetype;
        return $this;
    }
    /**
     * The type of the linked issue.
     *
     * @return FieldsIssueType
     */
    public function getIssueType2(): FieldsIssueType
    {
        return $this->issueType2;
    }
    /**
     * The type of the linked issue.
     *
     * @param FieldsIssueType $issueType2
     *
     * @return self
     */
    public function setIssueType2(FieldsIssueType $issueType2): self
    {
        $this->initialized['issueType2'] = true;
        $this->issueType2 = $issueType2;
        return $this;
    }
}
