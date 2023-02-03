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

class NotificationSchemeAndProjectMappingJsonBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var string
     */
    protected $notificationSchemeId;
    /**
     * @var string
     */
    protected $projectId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getNotificationSchemeId(): string
    {
        return $this->notificationSchemeId;
    }

    public function setNotificationSchemeId(string $notificationSchemeId): self
    {
        $this->initialized['notificationSchemeId'] = true;
        $this->notificationSchemeId = $notificationSchemeId;

        return $this;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
    }

    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }
}
