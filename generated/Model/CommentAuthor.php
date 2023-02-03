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

class CommentAuthor extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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
    protected $name;
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $key;
    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *
     * @var string
     */
    protected $accountId;
    /**
     * The email address of the user. Depending on the user’s privacy settings, this may be returned as null.
     *
     * @var string
     */
    protected $emailAddress;
    /**
     * The avatars of the user.
     *
     * @var UserDetailsAvatarUrls
     */
    protected $avatarUrls;
    /**
     * The display name of the user. Depending on the user’s privacy settings, this may return an alternative value.
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
     * The time zone specified in the user's profile. Depending on the user’s privacy settings, this may be returned as null.
     *
     * @var string
     */
    protected $timeZone;
    /**
     * The type of account represented by this user. This will be one of 'atlassian' (normal users), 'app' (application user) or 'customer' (Jira Service Desk customer user).
     *
     * @var string
     */
    protected $accountType;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the user.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the user.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * The email address of the user. Depending on the user’s privacy settings, this may be returned as null.
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * The email address of the user. Depending on the user’s privacy settings, this may be returned as null.
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->initialized['emailAddress'] = true;
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * The avatars of the user.
     */
    public function getAvatarUrls(): UserDetailsAvatarUrls
    {
        return $this->avatarUrls;
    }

    /**
     * The avatars of the user.
     */
    public function setAvatarUrls(UserDetailsAvatarUrls $avatarUrls): self
    {
        $this->initialized['avatarUrls'] = true;
        $this->avatarUrls = $avatarUrls;

        return $this;
    }

    /**
     * The display name of the user. Depending on the user’s privacy settings, this may return an alternative value.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the user. Depending on the user’s privacy settings, this may return an alternative value.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Whether the user is active.
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * Whether the user is active.
     */
    public function setActive(bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    /**
     * The time zone specified in the user's profile. Depending on the user’s privacy settings, this may be returned as null.
     */
    public function getTimeZone(): string
    {
        return $this->timeZone;
    }

    /**
     * The time zone specified in the user's profile. Depending on the user’s privacy settings, this may be returned as null.
     */
    public function setTimeZone(string $timeZone): self
    {
        $this->initialized['timeZone'] = true;
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * The type of account represented by this user. This will be one of 'atlassian' (normal users), 'app' (application user) or 'customer' (Jira Service Desk customer user).
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }

    /**
     * The type of account represented by this user. This will be one of 'atlassian' (normal users), 'app' (application user) or 'customer' (Jira Service Desk customer user).
     */
    public function setAccountType(string $accountType): self
    {
        $this->initialized['accountType'] = true;
        $this->accountType = $accountType;

        return $this;
    }
}
