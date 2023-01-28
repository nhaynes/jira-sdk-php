<?php

namespace JiraSdk\Model;

class WebhookDetails
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
    /**
     * The JQL filter that specifies which issues the webhook is sent for. Only a subset of JQL can be used. The supported elements are:
     *  Fields: `issueKey`, `project`, `issuetype`, `status`, `assignee`, `reporter`, `issue.property`, and `cf[id]`. For custom fields (`cf[id]`), only the epic label custom field is supported.".
     *  Operators: `=`, `!=`, `IN`, and `NOT IN`.
     *
     * @return string
     */
    public function getJqlFilter(): string
    {
        return $this->jqlFilter;
    }
    /**
     * The JQL filter that specifies which issues the webhook is sent for. Only a subset of JQL can be used. The supported elements are:
     *  Fields: `issueKey`, `project`, `issuetype`, `status`, `assignee`, `reporter`, `issue.property`, and `cf[id]`. For custom fields (`cf[id]`), only the epic label custom field is supported.".
     *  Operators: `=`, `!=`, `IN`, and `NOT IN`.
     *
     * @param string $jqlFilter
     *
     * @return self
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
     *
     * @return self
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
     *
     * @return self
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
     *
     * @return self
     */
    public function setEvents(array $events): self
    {
        $this->initialized['events'] = true;
        $this->events = $events;
        return $this;
    }
}
