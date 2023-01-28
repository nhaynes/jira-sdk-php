<?php

namespace JiraSdk\Model;

class NotificationSchemeEventDetails extends \ArrayObject
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
    /**
     * The ID of the event.
     *
     * @return NotificationSchemeEventDetailsEvent
     */
    public function getEvent(): NotificationSchemeEventDetailsEvent
    {
        return $this->event;
    }
    /**
     * The ID of the event.
     *
     * @param NotificationSchemeEventDetailsEvent $event
     *
     * @return self
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
