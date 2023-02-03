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

class DashboardOwner extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * The key of the user.
     *
     * @var string
     */
    protected $key;
    /**
     * The URL of the user.
     *
     * @var string
     */
    protected $self;
    /**
     * This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * The username of the user.
     *
     * @var string
     */
    protected $name;
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
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *
     * @var string
     */
    protected $accountId;
    /**
     * The avatars of the user.
     *
     * @var UserBeanAvatarUrls
     */
    protected $avatarUrls;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * The key of the user.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * The key of the user.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
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
     * This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * The username of the user.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * The username of the user.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The display name of the user. Depending on the user’s privacy setting, this may return an alternative value.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the user. Depending on the user’s privacy setting, this may return an alternative value.
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
     * The avatars of the user.
     */
    public function getAvatarUrls(): UserBeanAvatarUrls
    {
        return $this->avatarUrls;
    }

    /**
     * The avatars of the user.
     */
    public function setAvatarUrls(UserBeanAvatarUrls $avatarUrls): self
    {
        $this->initialized['avatarUrls'] = true;
        $this->avatarUrls = $avatarUrls;

        return $this;
    }
}
