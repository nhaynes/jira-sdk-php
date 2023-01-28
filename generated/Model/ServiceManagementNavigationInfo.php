<?php

namespace JiraSdk\Model;

class ServiceManagementNavigationInfo extends \ArrayObject
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
     *
     *
     * @var int
     */
    protected $queueId;
    /**
     *
     *
     * @var string
     */
    protected $queueName;
    /**
     *
     *
     * @var string
     */
    protected $queueCategory;
    /**
     *
     *
     * @return int
     */
    public function getQueueId(): int
    {
        return $this->queueId;
    }
    /**
     *
     *
     * @param int $queueId
     *
     * @return self
     */
    public function setQueueId(int $queueId): self
    {
        $this->initialized['queueId'] = true;
        $this->queueId = $queueId;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getQueueName(): string
    {
        return $this->queueName;
    }
    /**
     *
     *
     * @param string $queueName
     *
     * @return self
     */
    public function setQueueName(string $queueName): self
    {
        $this->initialized['queueName'] = true;
        $this->queueName = $queueName;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getQueueCategory(): string
    {
        return $this->queueCategory;
    }
    /**
     *
     *
     * @param string $queueCategory
     *
     * @return self
     */
    public function setQueueCategory(string $queueCategory): self
    {
        $this->initialized['queueCategory'] = true;
        $this->queueCategory = $queueCategory;
        return $this;
    }
}
