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

class ChangedWorklog
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the worklog.
     *
     * @var int
     */
    protected $worklogId;
    /**
     * The datetime of the change.
     *
     * @var int
     */
    protected $updatedTime;
    /**
     * Details of properties associated with the change.
     *
     * @var EntityProperty[]
     */
    protected $properties;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the worklog.
     */
    public function getWorklogId(): int
    {
        return $this->worklogId;
    }

    /**
     * The ID of the worklog.
     */
    public function setWorklogId(int $worklogId): self
    {
        $this->initialized['worklogId'] = true;
        $this->worklogId = $worklogId;

        return $this;
    }

    /**
     * The datetime of the change.
     */
    public function getUpdatedTime(): int
    {
        return $this->updatedTime;
    }

    /**
     * The datetime of the change.
     */
    public function setUpdatedTime(int $updatedTime): self
    {
        $this->initialized['updatedTime'] = true;
        $this->updatedTime = $updatedTime;

        return $this;
    }

    /**
     * Details of properties associated with the change.
     *
     * @return EntityProperty[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * Details of properties associated with the change.
     *
     * @param EntityProperty[] $properties
     */
    public function setProperties(array $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }
}
