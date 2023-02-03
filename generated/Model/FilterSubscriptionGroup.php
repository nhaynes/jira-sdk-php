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

class FilterSubscriptionGroup extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of group.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * The URL for these group details.
     *
     * @var string
     */
    protected $self;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of group.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of group.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * The URL for these group details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL for these group details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }
}
