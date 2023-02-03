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

class WebhookDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The JQL filter that specifies which issues the webhook is sent for. Only a subset of JQL can be used. The supported elements are:
     *  Fields: `issueKey`, `project`, `issuetype`, `status`, `assignee`, `reporter`, `issue.property`, and `cf[id]`. For custom fields (`cf[id]`), only the epic label custom field is supported.".
     *  Operators: `=`, `!=`, `IN`, and `NOT IN`.
     *
     * @var string
     */
    protected $jqlFilter;
    /**
     * A list of field IDs. When the issue changelog contains any of the fields, the webhook `jira:issue_updated` is sent. If this parameter is not present, the app is notified about all field updates.
     *
     * @var string[]
     */
    protected $fieldIdsFilter;
    /**
     * A list of issue property keys. A change of those issue properties triggers the `issue_property_set` or `issue_property_deleted` webhooks. If this parameter is not present, the app is notified about all issue property updates.
     *
     * @var string[]
     */
    protected $issuePropertyKeysFilter;
    /**
     * The Jira events that trigger the webhook.
     *
     * @var string[]
     */
    protected $events;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The JQL filter that specifies which issues the webhook is sent for. Only a subset of JQL can be used. The supported elements are:
     *  Fields: `issueKey`, `project`, `issuetype`, `status`, `assignee`, `reporter`, `issue.property`, and `cf[id]`. For custom fields (`cf[id]`), only the epic label custom field is supported.".
     *  Operators: `=`, `!=`, `IN`, and `NOT IN`.
     */
    public function getJqlFilter(): string
    {
        return $this->jqlFilter;
    }

    /**
     * The JQL filter that specifies which issues the webhook is sent for. Only a subset of JQL can be used. The supported elements are:
     *  Fields: `issueKey`, `project`, `issuetype`, `status`, `assignee`, `reporter`, `issue.property`, and `cf[id]`. For custom fields (`cf[id]`), only the epic label custom field is supported.".
     *  Operators: `=`, `!=`, `IN`, and `NOT IN`.
     */
    public function setJqlFilter(string $jqlFilter): self
    {
        $this->initialized['jqlFilter'] = true;
        $this->jqlFilter = $jqlFilter;

        return $this;
    }

    /**
     * A list of field IDs. When the issue changelog contains any of the fields, the webhook `jira:issue_updated` is sent. If this parameter is not present, the app is notified about all field updates.
     *
     * @return string[]
     */
    public function getFieldIdsFilter(): array
    {
        return $this->fieldIdsFilter;
    }

    /**
     * A list of field IDs. When the issue changelog contains any of the fields, the webhook `jira:issue_updated` is sent. If this parameter is not present, the app is notified about all field updates.
     *
     * @param string[] $fieldIdsFilter
     */
    public function setFieldIdsFilter(array $fieldIdsFilter): self
    {
        $this->initialized['fieldIdsFilter'] = true;
        $this->fieldIdsFilter = $fieldIdsFilter;

        return $this;
    }

    /**
     * A list of issue property keys. A change of those issue properties triggers the `issue_property_set` or `issue_property_deleted` webhooks. If this parameter is not present, the app is notified about all issue property updates.
     *
     * @return string[]
     */
    public function getIssuePropertyKeysFilter(): array
    {
        return $this->issuePropertyKeysFilter;
    }

    /**
     * A list of issue property keys. A change of those issue properties triggers the `issue_property_set` or `issue_property_deleted` webhooks. If this parameter is not present, the app is notified about all issue property updates.
     *
     * @param string[] $issuePropertyKeysFilter
     */
    public function setIssuePropertyKeysFilter(array $issuePropertyKeysFilter): self
    {
        $this->initialized['issuePropertyKeysFilter'] = true;
        $this->issuePropertyKeysFilter = $issuePropertyKeysFilter;

        return $this;
    }

    /**
     * The Jira events that trigger the webhook.
     *
     * @return string[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * The Jira events that trigger the webhook.
     *
     * @param string[] $events
     */
    public function setEvents(array $events): self
    {
        $this->initialized['events'] = true;
        $this->events = $events;

        return $this;
    }
}
