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

class StatusMapping
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the status.
     *
     * @var string
     */
    protected $statusId;
    /**
     * The ID of the new status.
     *
     * @var string
     */
    protected $newStatusId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type.
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }

    /**
     * The ID of the issue type.
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;

        return $this;
    }

    /**
     * The ID of the status.
     */
    public function getStatusId(): string
    {
        return $this->statusId;
    }

    /**
     * The ID of the status.
     */
    public function setStatusId(string $statusId): self
    {
        $this->initialized['statusId'] = true;
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * The ID of the new status.
     */
    public function getNewStatusId(): string
    {
        return $this->newStatusId;
    }

    /**
     * The ID of the new status.
     */
    public function setNewStatusId(string $newStatusId): self
    {
        $this->initialized['newStatusId'] = true;
        $this->newStatusId = $newStatusId;

        return $this;
    }
}
