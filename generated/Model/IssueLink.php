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

class IssueLink
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue link.
     *
     * @var string
     */
    protected $id;
    /**
     * The URL of the issue link.
     *
     * @var string
     */
    protected $self;
    /**
     * The type of link between the issues.
     *
     * @var IssueLinkType
     */
    protected $type;
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
     *
     * @var IssueLinkInwardIssue
     */
    protected $inwardIssue;
    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
     *
     * @var IssueLinkOutwardIssue
     */
    protected $outwardIssue;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue link.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue link.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The URL of the issue link.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue link.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The type of link between the issues.
     */
    public function getType(): IssueLinkType
    {
        return $this->type;
    }

    /**
     * The type of link between the issues.
     */
    public function setType(IssueLinkType $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
     */
    public function getInwardIssue(): IssueLinkInwardIssue
    {
        return $this->inwardIssue;
    }

    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link.
     */
    public function setInwardIssue(IssueLinkInwardIssue $inwardIssue): self
    {
        $this->initialized['inwardIssue'] = true;
        $this->inwardIssue = $inwardIssue;

        return $this;
    }

    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
     */
    public function getOutwardIssue(): IssueLinkOutwardIssue
    {
        return $this->outwardIssue;
    }

    /**
     * Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link.
     */
    public function setOutwardIssue(IssueLinkOutwardIssue $outwardIssue): self
    {
        $this->initialized['outwardIssue'] = true;
        $this->outwardIssue = $outwardIssue;

        return $this;
    }
}
