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

class Configuration
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether the ability for users to vote on issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     * @var bool
     */
    protected $votingEnabled;
    /**
     * Whether the ability for users to watch issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     * @var bool
     */
    protected $watchingEnabled;
    /**
     * Whether the ability to create unassigned issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     * @var bool
     */
    protected $unassignedIssuesAllowed;
    /**
     * Whether the ability to create subtasks for issues is enabled.
     *
     * @var bool
     */
    protected $subTasksEnabled;
    /**
     * Whether the ability to link issues is enabled.
     *
     * @var bool
     */
    protected $issueLinkingEnabled;
    /**
     * Whether the ability to track time is enabled. This property is deprecated.
     *
     * @var bool
     */
    protected $timeTrackingEnabled;
    /**
     * Whether the ability to add attachments to issues is enabled.
     *
     * @var bool
     */
    protected $attachmentsEnabled;
    /**
     * The configuration of time tracking.
     *
     * @var ConfigurationTimeTrackingConfiguration
     */
    protected $timeTrackingConfiguration;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the ability for users to vote on issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     */
    public function getVotingEnabled(): bool
    {
        return $this->votingEnabled;
    }

    /**
     * Whether the ability for users to vote on issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     */
    public function setVotingEnabled(bool $votingEnabled): self
    {
        $this->initialized['votingEnabled'] = true;
        $this->votingEnabled = $votingEnabled;

        return $this;
    }

    /**
     * Whether the ability for users to watch issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     */
    public function getWatchingEnabled(): bool
    {
        return $this->watchingEnabled;
    }

    /**
     * Whether the ability for users to watch issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     */
    public function setWatchingEnabled(bool $watchingEnabled): self
    {
        $this->initialized['watchingEnabled'] = true;
        $this->watchingEnabled = $watchingEnabled;

        return $this;
    }

    /**
     * Whether the ability to create unassigned issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     */
    public function getUnassignedIssuesAllowed(): bool
    {
        return $this->unassignedIssuesAllowed;
    }

    /**
     * Whether the ability to create unassigned issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     */
    public function setUnassignedIssuesAllowed(bool $unassignedIssuesAllowed): self
    {
        $this->initialized['unassignedIssuesAllowed'] = true;
        $this->unassignedIssuesAllowed = $unassignedIssuesAllowed;

        return $this;
    }

    /**
     * Whether the ability to create subtasks for issues is enabled.
     */
    public function getSubTasksEnabled(): bool
    {
        return $this->subTasksEnabled;
    }

    /**
     * Whether the ability to create subtasks for issues is enabled.
     */
    public function setSubTasksEnabled(bool $subTasksEnabled): self
    {
        $this->initialized['subTasksEnabled'] = true;
        $this->subTasksEnabled = $subTasksEnabled;

        return $this;
    }

    /**
     * Whether the ability to link issues is enabled.
     */
    public function getIssueLinkingEnabled(): bool
    {
        return $this->issueLinkingEnabled;
    }

    /**
     * Whether the ability to link issues is enabled.
     */
    public function setIssueLinkingEnabled(bool $issueLinkingEnabled): self
    {
        $this->initialized['issueLinkingEnabled'] = true;
        $this->issueLinkingEnabled = $issueLinkingEnabled;

        return $this;
    }

    /**
     * Whether the ability to track time is enabled. This property is deprecated.
     */
    public function getTimeTrackingEnabled(): bool
    {
        return $this->timeTrackingEnabled;
    }

    /**
     * Whether the ability to track time is enabled. This property is deprecated.
     */
    public function setTimeTrackingEnabled(bool $timeTrackingEnabled): self
    {
        $this->initialized['timeTrackingEnabled'] = true;
        $this->timeTrackingEnabled = $timeTrackingEnabled;

        return $this;
    }

    /**
     * Whether the ability to add attachments to issues is enabled.
     */
    public function getAttachmentsEnabled(): bool
    {
        return $this->attachmentsEnabled;
    }

    /**
     * Whether the ability to add attachments to issues is enabled.
     */
    public function setAttachmentsEnabled(bool $attachmentsEnabled): self
    {
        $this->initialized['attachmentsEnabled'] = true;
        $this->attachmentsEnabled = $attachmentsEnabled;

        return $this;
    }

    /**
     * The configuration of time tracking.
     */
    public function getTimeTrackingConfiguration(): ConfigurationTimeTrackingConfiguration
    {
        return $this->timeTrackingConfiguration;
    }

    /**
     * The configuration of time tracking.
     */
    public function setTimeTrackingConfiguration(ConfigurationTimeTrackingConfiguration $timeTrackingConfiguration): self
    {
        $this->initialized['timeTrackingConfiguration'] = true;
        $this->timeTrackingConfiguration = $timeTrackingConfiguration;

        return $this;
    }
}
