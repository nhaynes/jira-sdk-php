<?php

namespace JiraSdk\Model;

class CreateNotificationSchemeDetails extends \ArrayObject
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
     * The name of the notification scheme. Must be unique (case-insensitive).
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the notification scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @var NotificationSchemeEventDetails[]
     */
    protected $notificationSchemeEvents;
    /**
     * The name of the notification scheme. Must be unique (case-insensitive).
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the notification scheme. Must be unique (case-insensitive).
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the notification scheme.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the notification scheme.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
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
