<?php

namespace JiraSdk\Model;

class Avatar extends \ArrayObject
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
     * The ID of the avatar.
     *
     * @var string
     */
    protected $id;
    /**
     * The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user.
     *
     * @var string
     */
    protected $owner;
    /**
     * Whether the avatar is a system avatar.
     *
     * @var bool
     */
    protected $isSystemAvatar;
    /**
     * Whether the avatar is used in Jira. For example, shown as a project's avatar.
     *
     * @var bool
     */
    protected $isSelected;
    /**
     * Whether the avatar can be deleted.
     *
     * @var bool
     */
    protected $isDeletable;
    /**
     * The file name of the avatar icon. Returned for system avatars.
     *
     * @var string
     */
    protected $fileName;
    /**
     * The list of avatar icon URLs.
     *
     * @var string[]
     */
    protected $urls;
    /**
     * The ID of the avatar.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the avatar.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user.
     *
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }
    /**
     * The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user.
     *
     * @param string $owner
     *
     * @return self
     */
    public function setOwner(string $owner): self
    {
        $this->initialized['owner'] = true;
        $this->owner = $owner;
        return $this;
    }
    /**
     * Whether the avatar is a system avatar.
     *
     * @return bool
     */
    public function getIsSystemAvatar(): bool
    {
        return $this->isSystemAvatar;
    }
    /**
     * Whether the avatar is a system avatar.
     *
     * @param bool $isSystemAvatar
     *
     * @return self
     */
    public function setIsSystemAvatar(bool $isSystemAvatar): self
    {
        $this->initialized['isSystemAvatar'] = true;
        $this->isSystemAvatar = $isSystemAvatar;
        return $this;
    }
    /**
     * Whether the avatar is used in Jira. For example, shown as a project's avatar.
     *
     * @return bool
     */
    public function getIsSelected(): bool
    {
        return $this->isSelected;
    }
    /**
     * Whether the avatar is used in Jira. For example, shown as a project's avatar.
     *
     * @param bool $isSelected
     *
     * @return self
     */
    public function setIsSelected(bool $isSelected): self
    {
        $this->initialized['isSelected'] = true;
        $this->isSelected = $isSelected;
        return $this;
    }
    /**
     * Whether the avatar can be deleted.
     *
     * @return bool
     */
    public function getIsDeletable(): bool
    {
        return $this->isDeletable;
    }
    /**
     * Whether the avatar can be deleted.
     *
     * @param bool $isDeletable
     *
     * @return self
     */
    public function setIsDeletable(bool $isDeletable): self
    {
        $this->initialized['isDeletable'] = true;
        $this->isDeletable = $isDeletable;
        return $this;
    }
    /**
     * The file name of the avatar icon. Returned for system avatars.
     *
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }
    /**
     * The file name of the avatar icon. Returned for system avatars.
     *
     * @param string $fileName
     *
     * @return self
     */
    public function setFileName(string $fileName): self
    {
        $this->initialized['fileName'] = true;
        $this->fileName = $fileName;
        return $this;
    }
    /**
     * The list of avatar icon URLs.
     *
     * @return string[]
     */
    public function getUrls(): iterable
    {
        return $this->urls;
    }
    /**
     * The list of avatar icon URLs.
     *
     * @param string[] $urls
     *
     * @return self
     */
    public function setUrls(iterable $urls): self
    {
        $this->initialized['urls'] = true;
        $this->urls = $urls;
        return $this;
    }
}
