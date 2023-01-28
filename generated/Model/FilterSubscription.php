<?php

namespace JiraSdk\Model;

class FilterSubscription
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
     * The ID of the filter subscription.
     *
     * @var int
     */
    protected $id;
    /**
     * The user subscribing to filter.
     *
     * @var FilterSubscriptionUser
     */
    protected $user;
    /**
     * The group subscribing to filter.
     *
     * @var FilterSubscriptionGroup
     */
    protected $group;
    /**
     * The ID of the filter subscription.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the filter subscription.
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
     * The user subscribing to filter.
     *
     * @return FilterSubscriptionUser
     */
    public function getUser(): FilterSubscriptionUser
    {
        return $this->user;
    }
    /**
     * The user subscribing to filter.
     *
     * @param FilterSubscriptionUser $user
     *
     * @return self
     */
    public function setUser(FilterSubscriptionUser $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;
        return $this;
    }
    /**
     * The group subscribing to filter.
     *
     * @return FilterSubscriptionGroup
     */
    public function getGroup(): FilterSubscriptionGroup
    {
        return $this->group;
    }
    /**
     * The group subscribing to filter.
     *
     * @param FilterSubscriptionGroup $group
     *
     * @return self
     */
    public function setGroup(FilterSubscriptionGroup $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;
        return $this;
    }
}
