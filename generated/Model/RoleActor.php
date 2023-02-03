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

class RoleActor
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * @var RoleActorActorUser
     */
    protected $actorUser;
    /**
     * @var RoleActorActorGroup
     */
    protected $actorGroup;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the role actor.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the role actor.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * The type of role actor.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of role actor.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The avatar of the role actor.
     */
    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    /**
     * The avatar of the role actor.
     */
    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->initialized['avatarUrl'] = true;
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function getActorUser(): RoleActorActorUser
    {
        return $this->actorUser;
    }

    public function setActorUser(RoleActorActorUser $actorUser): self
    {
        $this->initialized['actorUser'] = true;
        $this->actorUser = $actorUser;

        return $this;
    }

    public function getActorGroup(): RoleActorActorGroup
    {
        return $this->actorGroup;
    }

    public function setActorGroup(RoleActorActorGroup $actorGroup): self
    {
        $this->initialized['actorGroup'] = true;
        $this->actorGroup = $actorGroup;

        return $this;
    }
}
