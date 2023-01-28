<?php

namespace JiraSdk\Model;

class AddNotificationsDetails extends \ArrayObject
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
     * The list of notifications which should be added to the notification scheme.
     *
     * @var NotificationSchemeEventDetails[]
     */
    protected $notificationSchemeEvents;
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
     *
     * @return self
     */
    public function setNotificationSchemeEvents(array $notificationSchemeEvents): self
    {
        $this->initialized['notificationSchemeEvents'] = true;
        $this->notificationSchemeEvents = $notificationSchemeEvents;
        return $this;
    }
}
