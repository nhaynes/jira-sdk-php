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

class IssueSecurityLevelMember
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue security level member.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the issue security level member.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The ID of the issue security level.
     */
    public function getIssueSecurityLevelId(): int
    {
        return $this->issueSecurityLevelId;
    }

    /**
     * The ID of the issue security level.
     */
    public function setIssueSecurityLevelId(int $issueSecurityLevelId): self
    {
        $this->initialized['issueSecurityLevelId'] = true;
        $this->issueSecurityLevelId = $issueSecurityLevelId;

        return $this;
    }

    /**
     * The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information.
     */
    public function getHolder(): IssueSecurityLevelMemberHolder
    {
        return $this->holder;
    }

    /**
     * The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information.
     */
    public function setHolder(IssueSecurityLevelMemberHolder $holder): self
    {
        $this->initialized['holder'] = true;
        $this->holder = $holder;

        return $this;
    }
}
