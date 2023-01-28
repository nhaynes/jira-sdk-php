<?php

namespace JiraSdk\Model;

class NotificationSchemeEvent
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
     * Details about a notification event.
     *
     * @var NotificationEvent
     */
    protected $event;
    /**
     *
     *
     * @var EventNotification[]
     */
    protected $notifications;
    /**
     * Details about a notification event.
     *
     * @return NotificationEvent
     */
    public function getEvent(): NotificationEvent
    {
        return $this->event;
    }
    /**
     * Details about a notification event.
     *
     * @param NotificationEvent $event
     *
     * @return self
     */
    public function setEvent(NotificationEvent $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
    /**
     *
     *
     * @return EventNotification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }
    /**
     *
     *
     * @param EventNotification[] $notifications
     *
     * @return self
     */
    public function setNotifications(array $notifications): self
    {
        $this->initialized['notifications'] = true;
        $this->notifications = $notifications;
        return $this;
    }
}
