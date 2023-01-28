<?php

namespace JiraSdk\Model;

class NotificationSchemeNotificationDetails extends \ArrayObject
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
     * The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`.
     *
     * @var string
     */
    protected $notificationType;
    /**
     * The value corresponding to the specified notification type.
     *
     * @var string
     */
    protected $parameter;
    /**
     * The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`.
     *
     * @return string
     */
    public function getNotificationType(): string
    {
        return $this->notificationType;
    }
    /**
     * The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`.
     *
     * @param string $notificationType
     *
     * @return self
     */
    public function setNotificationType(string $notificationType): self
    {
        $this->initialized['notificationType'] = true;
        $this->notificationType = $notificationType;
        return $this;
    }
    /**
     * The value corresponding to the specified notification type.
     *
     * @return string
     */
    public function getParameter(): string
    {
        return $this->parameter;
    }
    /**
     * The value corresponding to the specified notification type.
     *
     * @param string $parameter
     *
     * @return self
     */
    public function setParameter(string $parameter): self
    {
        $this->initialized['parameter'] = true;
        $this->parameter = $parameter;
        return $this;
    }
}
