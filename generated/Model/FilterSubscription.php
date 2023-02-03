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

class FilterSubscription
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the filter subscription.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the filter subscription.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The user subscribing to filter.
     */
    public function getUser(): FilterSubscriptionUser
    {
        return $this->user;
    }

    /**
     * The user subscribing to filter.
     */
    public function setUser(FilterSubscriptionUser $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    /**
     * The group subscribing to filter.
     */
    public function getGroup(): FilterSubscriptionGroup
    {
        return $this->group;
    }

    /**
     * The group subscribing to filter.
     */
    public function setGroup(FilterSubscriptionGroup $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;

        return $this;
    }
}
