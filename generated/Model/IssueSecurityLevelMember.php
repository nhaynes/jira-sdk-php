<?php

namespace JiraSdk\Model;

class IssueSecurityLevelMember
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
     * The ID of the issue security level member.
     *
     * @var int
     */
    protected $id;
    /**
     * The ID of the issue security level.
     *
     * @var int
     */
    protected $issueSecurityLevelId;
    /**
     * The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information.
     *
     * @var IssueSecurityLevelMemberHolder
     */
    protected $holder;
    /**
     * The ID of the issue security level member.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the issue security level member.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The ID of the issue security level.
     *
     * @return int
     */
    public function getIssueSecurityLevelId(): int
    {
        return $this->issueSecurityLevelId;
    }
    /**
     * The ID of the issue security level.
     *
     * @param int $issueSecurityLevelId
     *
     * @return self
     */
    public function setIssueSecurityLevelId(int $issueSecurityLevelId): self
    {
        $this->initialized['issueSecurityLevelId'] = true;
        $this->issueSecurityLevelId = $issueSecurityLevelId;
        return $this;
    }
    /**
     * The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information.
     *
     * @return IssueSecurityLevelMemberHolder
     */
    public function getHolder(): IssueSecurityLevelMemberHolder
    {
        return $this->holder;
    }
    /**
     * The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information.
     *
     * @param IssueSecurityLevelMemberHolder $holder
     *
     * @return self
     */
    public function setHolder(IssueSecurityLevelMemberHolder $holder): self
    {
        $this->initialized['holder'] = true;
        $this->holder = $holder;
        return $this;
    }
}
