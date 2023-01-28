<?php

namespace JiraSdk\Model;

class NotificationSchemeAndProjectMappingJsonBean
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
     *
     *
     * @var string
     */
    protected $notificationSchemeId;
    /**
     *
     *
     * @var string
     */
    protected $projectId;
    /**
     *
     *
     * @return string
     */
    public function getNotificationSchemeId(): string
    {
        return $this->notificationSchemeId;
    }
    /**
     *
     *
     * @param string $notificationSchemeId
     *
     * @return self
     */
    public function setNotificationSchemeId(string $notificationSchemeId): self
    {
        $this->initialized['notificationSchemeId'] = true;
        $this->notificationSchemeId = $notificationSchemeId;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     *
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
}
