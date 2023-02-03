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

class AddNotificationsDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @var NotificationSchemeEventDetails[]
     */
    protected $notificationSchemeEvents;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @return NotificationSchemeEventDetails[]
     */
    public function getNotificationSchemeEvents(): array
    {
        return $this->notificationSchemeEvents;
    }

    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @param NotificationSchemeEventDetails[] $notificationSchemeEvents
     */
    public function setNotificationSchemeEvents(array $notificationSchemeEvents): self
    {
        $this->initialized['notificationSchemeEvents'] = true;
        $this->notificationSchemeEvents = $notificationSchemeEvents;

        return $this;
    }
}
