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

class UserPickerUser
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *
     * @var string
     */
    protected $accountId;
    /**
     * This property is no longer available . See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $name;
    /**
     * This property is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $key;
    /**
     * The display name, email address, and key of the user with the matched query string highlighted with the HTML bold tag.
     *
     * @var string
     */
    protected $html;
    /**
     * The display name of the user. Depending on the user’s privacy setting, this may be returned as null.
     *
     * @var string
     */
    protected $displayName;
    /**
     * The avatar URL of the user.
     *
     * @var string
     */
    protected $avatarUrl;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
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
     * This property is no longer available . See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * This property is no longer available . See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * This property is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * This property is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The display name, email address, and key of the user with the matched query string highlighted with the HTML bold tag.
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * The display name, email address, and key of the user with the matched query string highlighted with the HTML bold tag.
     */
    public function setHtml(string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;

        return $this;
    }

    /**
     * The display name of the user. Depending on the user’s privacy setting, this may be returned as null.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the user. Depending on the user’s privacy setting, this may be returned as null.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * The avatar URL of the user.
     */
    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    /**
     * The avatar URL of the user.
     */
    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->initialized['avatarUrl'] = true;
        $this->avatarUrl = $avatarUrl;

        return $this;
    }
}
