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

class Webhook
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the webhook.
     *
     * @var int
     */
    protected $id;
    /**
     * The JQL filter that specifies which issues the webhook is sent for.
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
     * The date after which the webhook is no longer sent. Use [Extend webhook life](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-refresh-put) to extend the date.
     *
     * @var int
     */
    protected $expirationDate;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the webhook.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the webhook.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The JQL filter that specifies which issues the webhook is sent for.
     */
    public function getJqlFilter(): string
    {
        return $this->jqlFilter;
    }

    /**
     * The JQL filter that specifies which issues the webhook is sent for.
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

    /**
     * The date after which the webhook is no longer sent. Use [Extend webhook life](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-refresh-put) to extend the date.
     */
    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }

    /**
     * The date after which the webhook is no longer sent. Use [Extend webhook life](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-refresh-put) to extend the date.
     */
    public function setExpirationDate(int $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }
}
