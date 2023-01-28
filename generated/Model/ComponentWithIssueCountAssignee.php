<?php

namespace JiraSdk\Model;

class ComponentWithIssueCountAssignee extends \ArrayObject
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
     * The URL of the user.
     *
     * @var string
     */
    protected $self;
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $key;
    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests.
     *
     * @var string
     */
    protected $accountId;
    /**
     * The user account type. Can take the following values:
     *  `atlassian` regular Atlassian user account
     *  `app` system account used for Connect applications and OAuth to represent external systems
     *  `customer` Jira Service Desk account representing an external service desk
     *
     * @var string
     */
    protected $accountType;
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $name;
    /**
     * The email address of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @var string
     */
    protected $emailAddress;
    /**
     * The avatars of the user.
     *
     * @var UserAvatarUrls
     */
    protected $avatarUrls;
    /**
     * The display name of the user. Depending on the user’s privacy setting, this may return an alternative value.
     *
     * @var string
     */
    protected $displayName;
    /**
     * Whether the user is active.
     *
     * @var bool
     */
    protected $active;
    /**
     * The time zone specified in the user's profile. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @var string
     */
    protected $timeZone;
    /**
     * The locale of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @var string
     */
    protected $locale;
    /**
     * The groups that the user belongs to.
     *
     * @var UserGroups
     */
    protected $groups;
    /**
     * The application roles the user is assigned to.
     *
     * @var UserApplicationRoles
     */
    protected $applicationRoles;
    /**
     * Expand options that include additional user details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The URL of the user.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the user.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests.
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests.
     *
     * @param string $accountId
     *
     * @return self
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;
        return $this;
    }
    /**
     * The user account type. Can take the following values:
     *  `atlassian` regular Atlassian user account
     *  `app` system account used for Connect applications and OAuth to represent external systems
     *  `customer` Jira Service Desk account representing an external service desk
     *
     * @return string
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }
    /**
     * The user account type. Can take the following values:
     *  `atlassian` regular Atlassian user account
     *  `app` system account used for Connect applications and OAuth to represent external systems
     *  `customer` Jira Service Desk account representing an external service desk
     *
     * @param string $accountType
     *
     * @return self
     */
    public function setAccountType(string $accountType): self
    {
        $this->initialized['accountType'] = true;
        $this->accountType = $accountType;
        return $this;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The email address of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
    /**
     * The email address of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @param string $emailAddress
     *
     * @return self
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->initialized['emailAddress'] = true;
        $this->emailAddress = $emailAddress;
        return $this;
    }
    /**
     * The avatars of the user.
     *
     * @return UserAvatarUrls
     */
    public function getAvatarUrls(): UserAvatarUrls
    {
        return $this->avatarUrls;
    }
    /**
     * The avatars of the user.
     *
     * @param UserAvatarUrls $avatarUrls
     *
     * @return self
     */
    public function setAvatarUrls(UserAvatarUrls $avatarUrls): self
    {
        $this->initialized['avatarUrls'] = true;
        $this->avatarUrls = $avatarUrls;
        return $this;
    }
    /**
     * The display name of the user. Depending on the user’s privacy setting, this may return an alternative value.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }
    /**
     * The display name of the user. Depending on the user’s privacy setting, this may return an alternative value.
     *
     * @param string $displayName
     *
     * @return self
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Whether the user is active.
     *
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }
    /**
     * Whether the user is active.
     *
     * @param bool $active
     *
     * @return self
     */
    public function setActive(bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;
        return $this;
    }
    /**
     * The time zone specified in the user's profile. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @return string
     */
    public function getTimeZone(): string
    {
        return $this->timeZone;
    }
    /**
     * The time zone specified in the user's profile. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @param string $timeZone
     *
     * @return self
     */
    public function setTimeZone(string $timeZone): self
    {
        $this->initialized['timeZone'] = true;
        $this->timeZone = $timeZone;
        return $this;
    }
    /**
     * The locale of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
    /**
     * The locale of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @param string $locale
     *
     * @return self
     */
    public function setLocale(string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
    /**
     * The groups that the user belongs to.
     *
     * @return UserGroups
     */
    public function getGroups(): UserGroups
    {
        return $this->groups;
    }
    /**
     * The groups that the user belongs to.
     *
     * @param UserGroups $groups
     *
     * @return self
     */
    public function setGroups(UserGroups $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;
        return $this;
    }
    /**
     * The application roles the user is assigned to.
     *
     * @return UserApplicationRoles
     */
    public function getApplicationRoles(): UserApplicationRoles
    {
        return $this->applicationRoles;
    }
    /**
     * The application roles the user is assigned to.
     *
     * @param UserApplicationRoles $applicationRoles
     *
     * @return self
     */
    public function setApplicationRoles(UserApplicationRoles $applicationRoles): self
    {
        $this->initialized['applicationRoles'] = true;
        $this->applicationRoles = $applicationRoles;
        return $this;
    }
    /**
     * Expand options that include additional user details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional user details in the response.
     *
     * @param string $expand
     *
     * @return self
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
}