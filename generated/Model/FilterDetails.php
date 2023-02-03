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

class FilterDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Expand options that include additional filter details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The URL of the filter.
     *
     * @var string
     */
    protected $self;
    /**
     * The unique identifier for the filter.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the filter.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the filter.
     *
     * @var string
     */
    protected $description;
    /**
     * The user who owns the filter. Defaults to the creator of the filter, however, Jira administrators can change the owner of a shared filter in the admin settings.
     *
     * @var FilterDetailsOwner
     */
    protected $owner;
    /**
     * The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*.
     *
     * @var string
     */
    protected $jql;
    /**
     * A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*.
     *
     * @var string
     */
    protected $viewUrl;
    /**
     * A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*.
     *
     * @var string
     */
    protected $searchUrl;
    /**
     * Whether the filter is selected as a favorite by any users, not including the filter owner.
     *
     * @var bool
     */
    protected $favourite;
    /**
     * The count of how many users have selected this filter as a favorite, including the filter owner.
     *
     * @var int
     */
    protected $favouritedCount;
    /**
     * The groups and projects that the filter is shared with. This can be specified when updating a filter, but not when creating a filter.
     *
     * @var SharePermission[]
     */
    protected $sharePermissions;
    /**
     * The groups and projects that can edit the filter. This can be specified when updating a filter, but not when creating a filter.
     *
     * @var SharePermission[]
     */
    protected $editPermissions;
    /**
     * The users that are subscribed to the filter.
     *
     * @var FilterSubscription[]
     */
    protected $subscriptions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Expand options that include additional filter details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional filter details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * The URL of the filter.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the filter.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The unique identifier for the filter.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The unique identifier for the filter.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the filter.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the filter.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the filter.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the filter.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The user who owns the filter. Defaults to the creator of the filter, however, Jira administrators can change the owner of a shared filter in the admin settings.
     */
    public function getOwner(): FilterDetailsOwner
    {
        return $this->owner;
    }

    /**
     * The user who owns the filter. Defaults to the creator of the filter, however, Jira administrators can change the owner of a shared filter in the admin settings.
     */
    public function setOwner(FilterDetailsOwner $owner): self
    {
        $this->initialized['owner'] = true;
        $this->owner = $owner;

        return $this;
    }

    /**
     * The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*.
     */
    public function getJql(): string
    {
        return $this->jql;
    }

    /**
     * The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*.
     */
    public function setJql(string $jql): self
    {
        $this->initialized['jql'] = true;
        $this->jql = $jql;

        return $this;
    }

    /**
     * A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*.
     */
    public function getViewUrl(): string
    {
        return $this->viewUrl;
    }

    /**
     * A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*.
     */
    public function setViewUrl(string $viewUrl): self
    {
        $this->initialized['viewUrl'] = true;
        $this->viewUrl = $viewUrl;

        return $this;
    }

    /**
     * A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*.
     */
    public function getSearchUrl(): string
    {
        return $this->searchUrl;
    }

    /**
     * A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*.
     */
    public function setSearchUrl(string $searchUrl): self
    {
        $this->initialized['searchUrl'] = true;
        $this->searchUrl = $searchUrl;

        return $this;
    }

    /**
     * Whether the filter is selected as a favorite by any users, not including the filter owner.
     */
    public function getFavourite(): bool
    {
        return $this->favourite;
    }

    /**
     * Whether the filter is selected as a favorite by any users, not including the filter owner.
     */
    public function setFavourite(bool $favourite): self
    {
        $this->initialized['favourite'] = true;
        $this->favourite = $favourite;

        return $this;
    }

    /**
     * The count of how many users have selected this filter as a favorite, including the filter owner.
     */
    public function getFavouritedCount(): int
    {
        return $this->favouritedCount;
    }

    /**
     * The count of how many users have selected this filter as a favorite, including the filter owner.
     */
    public function setFavouritedCount(int $favouritedCount): self
    {
        $this->initialized['favouritedCount'] = true;
        $this->favouritedCount = $favouritedCount;

        return $this;
    }

    /**
     * The groups and projects that the filter is shared with. This can be specified when updating a filter, but not when creating a filter.
     *
     * @return SharePermission[]
     */
    public function getSharePermissions(): array
    {
        return $this->sharePermissions;
    }

    /**
     * The groups and projects that the filter is shared with. This can be specified when updating a filter, but not when creating a filter.
     *
     * @param SharePermission[] $sharePermissions
     */
    public function setSharePermissions(array $sharePermissions): self
    {
        $this->initialized['sharePermissions'] = true;
        $this->sharePermissions = $sharePermissions;

        return $this;
    }

    /**
     * The groups and projects that can edit the filter. This can be specified when updating a filter, but not when creating a filter.
     *
     * @return SharePermission[]
     */
    public function getEditPermissions(): array
    {
        return $this->editPermissions;
    }

    /**
     * The groups and projects that can edit the filter. This can be specified when updating a filter, but not when creating a filter.
     *
     * @param SharePermission[] $editPermissions
     */
    public function setEditPermissions(array $editPermissions): self
    {
        $this->initialized['editPermissions'] = true;
        $this->editPermissions = $editPermissions;

        return $this;
    }

    /**
     * The users that are subscribed to the filter.
     *
     * @return FilterSubscription[]
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    /**
     * The users that are subscribed to the filter.
     *
     * @param FilterSubscription[] $subscriptions
     */
    public function setSubscriptions(array $subscriptions): self
    {
        $this->initialized['subscriptions'] = true;
        $this->subscriptions = $subscriptions;

        return $this;
    }
}
