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

class ApplicationRole
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The key of the application role.
     *
     * @var string
     */
    protected $key;
    /**
     * The groups associated with the application role. As a group's name can change, use of `groupDetails` is recommended to identify a groups.
     *
     * @var string[]
     */
    protected $groups;
    /**
     * The groups associated with the application role.
     *
     * @var GroupName[]
     */
    protected $groupDetails;
    /**
     * The display name of the application role.
     *
     * @var string
     */
    protected $name;
    /**
     * The groups that are granted default access for this application role. As a group's name can change, use of `defaultGroupsDetails` is recommended to identify a groups.
     *
     * @var string[]
     */
    protected $defaultGroups;
    /**
     * The groups that are granted default access for this application role.
     *
     * @var GroupName[]
     */
    protected $defaultGroupsDetails;
    /**
     * Determines whether this application role should be selected by default on user creation.
     *
     * @var bool
     */
    protected $selectedByDefault;
    /**
     * Deprecated.
     *
     * @var bool
     */
    protected $defined;
    /**
     * The maximum count of users on your license.
     *
     * @var int
     */
    protected $numberOfSeats;
    /**
     * The count of users remaining on your license.
     *
     * @var int
     */
    protected $remainingSeats;
    /**
     * The number of users counting against your license.
     *
     * @var int
     */
    protected $userCount;
    /**
     * The [type of users](https://confluence.atlassian.com/x/lRW3Ng) being counted against your license.
     *
     * @var string
     */
    protected $userCountDescription;
    /**
     * @var bool
     */
    protected $hasUnlimitedSeats;
    /**
     * Indicates if the application role belongs to Jira platform (`jira-core`).
     *
     * @var bool
     */
    protected $platform;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The key of the application role.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the application role.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The groups associated with the application role. As a group's name can change, use of `groupDetails` is recommended to identify a groups.
     *
     * @return string[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * The groups associated with the application role. As a group's name can change, use of `groupDetails` is recommended to identify a groups.
     *
     * @param string[] $groups
     */
    public function setGroups(array $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;

        return $this;
    }

    /**
     * The groups associated with the application role.
     *
     * @return GroupName[]
     */
    public function getGroupDetails(): array
    {
        return $this->groupDetails;
    }

    /**
     * The groups associated with the application role.
     *
     * @param GroupName[] $groupDetails
     */
    public function setGroupDetails(array $groupDetails): self
    {
        $this->initialized['groupDetails'] = true;
        $this->groupDetails = $groupDetails;

        return $this;
    }

    /**
     * The display name of the application role.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The display name of the application role.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The groups that are granted default access for this application role. As a group's name can change, use of `defaultGroupsDetails` is recommended to identify a groups.
     *
     * @return string[]
     */
    public function getDefaultGroups(): array
    {
        return $this->defaultGroups;
    }

    /**
     * The groups that are granted default access for this application role. As a group's name can change, use of `defaultGroupsDetails` is recommended to identify a groups.
     *
     * @param string[] $defaultGroups
     */
    public function setDefaultGroups(array $defaultGroups): self
    {
        $this->initialized['defaultGroups'] = true;
        $this->defaultGroups = $defaultGroups;

        return $this;
    }

    /**
     * The groups that are granted default access for this application role.
     *
     * @return GroupName[]
     */
    public function getDefaultGroupsDetails(): array
    {
        return $this->defaultGroupsDetails;
    }

    /**
     * The groups that are granted default access for this application role.
     *
     * @param GroupName[] $defaultGroupsDetails
     */
    public function setDefaultGroupsDetails(array $defaultGroupsDetails): self
    {
        $this->initialized['defaultGroupsDetails'] = true;
        $this->defaultGroupsDetails = $defaultGroupsDetails;

        return $this;
    }

    /**
     * Determines whether this application role should be selected by default on user creation.
     */
    public function getSelectedByDefault(): bool
    {
        return $this->selectedByDefault;
    }

    /**
     * Determines whether this application role should be selected by default on user creation.
     */
    public function setSelectedByDefault(bool $selectedByDefault): self
    {
        $this->initialized['selectedByDefault'] = true;
        $this->selectedByDefault = $selectedByDefault;

        return $this;
    }

    /**
     * Deprecated.
     */
    public function getDefined(): bool
    {
        return $this->defined;
    }

    /**
     * Deprecated.
     */
    public function setDefined(bool $defined): self
    {
        $this->initialized['defined'] = true;
        $this->defined = $defined;

        return $this;
    }

    /**
     * The maximum count of users on your license.
     */
    public function getNumberOfSeats(): int
    {
        return $this->numberOfSeats;
    }

    /**
     * The maximum count of users on your license.
     */
    public function setNumberOfSeats(int $numberOfSeats): self
    {
        $this->initialized['numberOfSeats'] = true;
        $this->numberOfSeats = $numberOfSeats;

        return $this;
    }

    /**
     * The count of users remaining on your license.
     */
    public function getRemainingSeats(): int
    {
        return $this->remainingSeats;
    }

    /**
     * The count of users remaining on your license.
     */
    public function setRemainingSeats(int $remainingSeats): self
    {
        $this->initialized['remainingSeats'] = true;
        $this->remainingSeats = $remainingSeats;

        return $this;
    }

    /**
     * The number of users counting against your license.
     */
    public function getUserCount(): int
    {
        return $this->userCount;
    }

    /**
     * The number of users counting against your license.
     */
    public function setUserCount(int $userCount): self
    {
        $this->initialized['userCount'] = true;
        $this->userCount = $userCount;

        return $this;
    }

    /**
     * The [type of users](https://confluence.atlassian.com/x/lRW3Ng) being counted against your license.
     */
    public function getUserCountDescription(): string
    {
        return $this->userCountDescription;
    }

    /**
     * The [type of users](https://confluence.atlassian.com/x/lRW3Ng) being counted against your license.
     */
    public function setUserCountDescription(string $userCountDescription): self
    {
        $this->initialized['userCountDescription'] = true;
        $this->userCountDescription = $userCountDescription;

        return $this;
    }

    public function getHasUnlimitedSeats(): bool
    {
        return $this->hasUnlimitedSeats;
    }

    public function setHasUnlimitedSeats(bool $hasUnlimitedSeats): self
    {
        $this->initialized['hasUnlimitedSeats'] = true;
        $this->hasUnlimitedSeats = $hasUnlimitedSeats;

        return $this;
    }

    /**
     * Indicates if the application role belongs to Jira platform (`jira-core`).
     */
    public function getPlatform(): bool
    {
        return $this->platform;
    }

    /**
     * Indicates if the application role belongs to Jira platform (`jira-core`).
     */
    public function setPlatform(bool $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }
}
