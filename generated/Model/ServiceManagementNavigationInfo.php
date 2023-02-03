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

class ServiceManagementNavigationInfo extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int
     */
    protected $queueId;
    /**
     * @var string
     */
    protected $queueName;
    /**
     * @var string
     */
    protected $queueCategory;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function setQueueId(int $queueId): self
    {
        $this->initialized['queueId'] = true;
        $this->queueId = $queueId;

        return $this;
    }

    public function getQueueName(): string
    {
        return $this->queueName;
    }

    public function setQueueName(string $queueName): self
    {
        $this->initialized['queueName'] = true;
        $this->queueName = $queueName;

        return $this;
    }

    public function getQueueCategory(): string
    {
        return $this->queueCategory;
    }

    public function setQueueCategory(string $queueCategory): self
    {
        $this->initialized['queueCategory'] = true;
        $this->queueCategory = $queueCategory;

        return $this;
    }
}
