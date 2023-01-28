<?php

namespace JiraSdk\Model;

class RoleActor
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
     * The ID of the role actor.
     *
     * @var int
     */
    protected $id;
    /**
     * The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name.
     *
     * @var string
     */
    protected $displayName;
    /**
     * The type of role actor.
     *
     * @var string
     */
    protected $type;
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $name;
    /**
     * The avatar of the role actor.
     *
     * @var string
     */
    protected $avatarUrl;
    /**
     *
     *
     * @var RoleActorActorUser
     */
    protected $actorUser;
    /**
     *
     *
     * @var RoleActorActorGroup
     */
    protected $actorGroup;
    /**
     * The ID of the role actor.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the role actor.
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
     * The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }
    /**
     * The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name.
     *
     * @param string $displayName
     *
     * @return self
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * The type of role actor.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of role actor.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
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
     * The avatar of the role actor.
     *
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }
    /**
     * The avatar of the role actor.
     *
     * @param string $avatarUrl
     *
     * @return self
     */
    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->initialized['avatarUrl'] = true;
        $this->avatarUrl = $avatarUrl;
        return $this;
    }
    /**
     *
     *
     * @return RoleActorActorUser
     */
    public function getActorUser(): RoleActorActorUser
    {
        return $this->actorUser;
    }
    /**
     *
     *
     * @param RoleActorActorUser $actorUser
     *
     * @return self
     */
    public function setActorUser(RoleActorActorUser $actorUser): self
    {
        $this->initialized['actorUser'] = true;
        $this->actorUser = $actorUser;
        return $this;
    }
    /**
     *
     *
     * @return RoleActorActorGroup
     */
    public function getActorGroup(): RoleActorActorGroup
    {
        return $this->actorGroup;
    }
    /**
     *
     *
     * @param RoleActorActorGroup $actorGroup
     *
     * @return self
     */
    public function setActorGroup(RoleActorActorGroup $actorGroup): self
    {
        $this->initialized['actorGroup'] = true;
        $this->actorGroup = $actorGroup;
        return $this;
    }
}
