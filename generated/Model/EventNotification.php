<?php

namespace JiraSdk\Model;

class EventNotification
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
     * Expand options that include additional event notification details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The ID of the notification.
     *
     * @var int
     */
    protected $id;
    /**
     * Identifies the recipients of the notification.
     *
     * @var string
     */
    protected $notificationType;
    /**
     * As a group's name can change, use of `recipient` is recommended. The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by `notificationType` value. So, when `notificationType` is:
     *  `User` The `parameter` is the user account ID.
     *  `Group` The `parameter` is the group name.
     *  `ProjectRole` The `parameter` is the project role ID.
     *  `UserCustomField` The `parameter` is the ID of the custom field.
     *  `GroupCustomField` The `parameter` is the ID of the custom field.
     *
     * @var string
     */
    protected $parameter;
    /**
     * The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by the `notificationType` value. So, when `notificationType` is:
     *  `User`, `recipient` is the user account ID.
     *  `Group`, `recipient` is the group ID.
     *  `ProjectRole`, `recipient` is the project role ID.
     *  `UserCustomField`, `recipient` is the ID of the custom field.
     *  `GroupCustomField`, `recipient` is the ID of the custom field.
     *
     * @var string
     */
    protected $recipient;
    /**
     * The specified group.
     *
     * @var EventNotificationGroup
     */
    protected $group;
    /**
     * The custom user or group field.
     *
     * @var EventNotificationField
     */
    protected $field;
    /**
     * The email address.
     *
     * @var string
     */
    protected $emailAddress;
    /**
     * The specified project role.
     *
     * @var EventNotificationProjectRole
     */
    protected $projectRole;
    /**
     * The specified user.
     *
     * @var EventNotificationUser
     */
    protected $user;
    /**
     * Expand options that include additional event notification details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional event notification details in the response.
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
     * The ID of the notification.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the notification.
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
     * Identifies the recipients of the notification.
     *
     * @return string
     */
    public function getNotificationType(): string
    {
        return $this->notificationType;
    }
    /**
     * Identifies the recipients of the notification.
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
     * As a group's name can change, use of `recipient` is recommended. The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by `notificationType` value. So, when `notificationType` is:
     *  `User` The `parameter` is the user account ID.
     *  `Group` The `parameter` is the group name.
     *  `ProjectRole` The `parameter` is the project role ID.
     *  `UserCustomField` The `parameter` is the ID of the custom field.
     *  `GroupCustomField` The `parameter` is the ID of the custom field.
     *
     * @return string
     */
    public function getParameter(): string
    {
        return $this->parameter;
    }
    /**
     * As a group's name can change, use of `recipient` is recommended. The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by `notificationType` value. So, when `notificationType` is:
     *  `User` The `parameter` is the user account ID.
     *  `Group` The `parameter` is the group name.
     *  `ProjectRole` The `parameter` is the project role ID.
     *  `UserCustomField` The `parameter` is the ID of the custom field.
     *  `GroupCustomField` The `parameter` is the ID of the custom field.
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
    /**
     * The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by the `notificationType` value. So, when `notificationType` is:
     *  `User`, `recipient` is the user account ID.
     *  `Group`, `recipient` is the group ID.
     *  `ProjectRole`, `recipient` is the project role ID.
     *  `UserCustomField`, `recipient` is the ID of the custom field.
     *  `GroupCustomField`, `recipient` is the ID of the custom field.
     *
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }
    /**
     * The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by the `notificationType` value. So, when `notificationType` is:
     *  `User`, `recipient` is the user account ID.
     *  `Group`, `recipient` is the group ID.
     *  `ProjectRole`, `recipient` is the project role ID.
     *  `UserCustomField`, `recipient` is the ID of the custom field.
     *  `GroupCustomField`, `recipient` is the ID of the custom field.
     *
     * @param string $recipient
     *
     * @return self
     */
    public function setRecipient(string $recipient): self
    {
        $this->initialized['recipient'] = true;
        $this->recipient = $recipient;
        return $this;
    }
    /**
     * The specified group.
     *
     * @return EventNotificationGroup
     */
    public function getGroup(): EventNotificationGroup
    {
        return $this->group;
    }
    /**
     * The specified group.
     *
     * @param EventNotificationGroup $group
     *
     * @return self
     */
    public function setGroup(EventNotificationGroup $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;
        return $this;
    }
    /**
     * The custom user or group field.
     *
     * @return EventNotificationField
     */
    public function getField(): EventNotificationField
    {
        return $this->field;
    }
    /**
     * The custom user or group field.
     *
     * @param EventNotificationField $field
     *
     * @return self
     */
    public function setField(EventNotificationField $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;
        return $this;
    }
    /**
     * The email address.
     *
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
    /**
     * The email address.
     *
     * @param string $emailAddress
     *
     * @return self
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->initialized['emailAddress'] = true;
        $this->emailAddress = $emailAddress;
        return $this;
    }
    /**
     * The specified project role.
     *
     * @return EventNotificationProjectRole
     */
    public function getProjectRole(): EventNotificationProjectRole
    {
        return $this->projectRole;
    }
    /**
     * The specified project role.
     *
     * @param EventNotificationProjectRole $projectRole
     *
     * @return self
     */
    public function setProjectRole(EventNotificationProjectRole $projectRole): self
    {
        $this->initialized['projectRole'] = true;
        $this->projectRole = $projectRole;
        return $this;
    }
    /**
     * The specified user.
     *
     * @return EventNotificationUser
     */
    public function getUser(): EventNotificationUser
    {
        return $this->user;
    }
    /**
     * The specified user.
     *
     * @param EventNotificationUser $user
     *
     * @return self
     */
    public function setUser(EventNotificationUser $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;
        return $this;
    }
}
