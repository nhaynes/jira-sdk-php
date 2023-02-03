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

class NotificationSchemeEventDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the event.
     *
     * @var NotificationSchemeEventDetailsEvent
     */
    protected $event;
    /**
     * The list of notifications mapped to a specified event.
     *
     * @var NotificationSchemeNotificationDetails[]
     */
    protected $notifications;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the event.
     */
    public function getEvent(): NotificationSchemeEventDetailsEvent
    {
        return $this->event;
    }

    /**
     * The ID of the event.
     */
    public function setEvent(NotificationSchemeEventDetailsEvent $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;

        return $this;
    }

    /**
     * The list of notifications mapped to a specified event.
     *
     * @return NotificationSchemeNotificationDetails[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * The list of notifications mapped to a specified event.
     *
     * @param NotificationSchemeNotificationDetails[] $notifications
     */
    public function setNotifications(array $notifications): self
    {
        $this->initialized['notifications'] = true;
        $this->notifications = $notifications;

        return $this;
    }
}
