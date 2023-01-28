<?php

namespace JiraSdk\Model;

class NotificationScheme
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
     * Expand options that include additional notification scheme details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The ID of the notification scheme.
     *
     * @var int
     */
    protected $id;
    /**
     *
     *
     * @var string
     */
    protected $self;
    /**
     * The name of the notification scheme.
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
     * The notification events and associated recipients.
     *
     * @var NotificationSchemeEvent[]
     */
    protected $notificationSchemeEvents;
    /**
     * The scope of the notification scheme.
     *
     * @var NotificationSchemeScope
     */
    protected $scope;
    /**
     * The list of project IDs associated with the notification scheme.
     *
     * @var int[]
     */
    protected $projects;
    /**
     * Expand options that include additional notification scheme details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional notification scheme details in the response.
     *
     * @param string $expand
     *
     * @return self
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
    /**
     * The ID of the notification scheme.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the notification scheme.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     *
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The name of the notification scheme.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the notification scheme.
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
     * The notification events and associated recipients.
     *
     * @return NotificationSchemeEvent[]
     */
    public function getNotificationSchemeEvents(): array
    {
        return $this->notificationSchemeEvents;
    }
    /**
     * The notification events and associated recipients.
     *
     * @param NotificationSchemeEvent[] $notificationSchemeEvents
     *
     * @return self
     */
    public function setNotificationSchemeEvents(array $notificationSchemeEvents): self
    {
        $this->initialized['notificationSchemeEvents'] = true;
        $this->notificationSchemeEvents = $notificationSchemeEvents;
        return $this;
    }
    /**
     * The scope of the notification scheme.
     *
     * @return NotificationSchemeScope
     */
    public function getScope(): NotificationSchemeScope
    {
        return $this->scope;
    }
    /**
     * The scope of the notification scheme.
     *
     * @param NotificationSchemeScope $scope
     *
     * @return self
     */
    public function setScope(NotificationSchemeScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * The list of project IDs associated with the notification scheme.
     *
     * @return int[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }
    /**
     * The list of project IDs associated with the notification scheme.
     *
     * @param int[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
}
