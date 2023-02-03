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

class NotificationSchemeEvent
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Details about a notification event.
     *
     * @var NotificationEvent
     */
    protected $event;
    /**
     * @var EventNotification[]
     */
    protected $notifications;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details about a notification event.
     */
    public function getEvent(): NotificationEvent
    {
        return $this->event;
    }

    /**
     * Details about a notification event.
     */
    public function setEvent(NotificationEvent $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;

        return $this;
    }

    /**
     * @return EventNotification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * @param EventNotification[] $notifications
     */
    public function setNotifications(array $notifications): self
    {
        $this->initialized['notifications'] = true;
        $this->notifications = $notifications;

        return $this;
    }
}
