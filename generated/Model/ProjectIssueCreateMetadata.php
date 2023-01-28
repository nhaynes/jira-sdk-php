<?php

namespace JiraSdk\Model;

class ProjectIssueCreateMetadata
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
     * Expand options that include additional project issue create metadata details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The URL of the project.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the project.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the project.
     *
     * @var string
     */
    protected $name;
    /**
     * List of the project's avatars, returning the avatar size and associated URL.
     *
     * @var ProjectIssueCreateMetadataAvatarUrls
     */
    protected $avatarUrls;
    /**
     * List of the issue types supported by the project.
     *
     * @var IssueTypeIssueCreateMetadata[]
     */
    protected $issuetypes;
    /**
     * Expand options that include additional project issue create metadata details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional project issue create metadata details in the response.
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
     * The URL of the project.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the project.
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
     * The ID of the project.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the project.
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
     * The key of the project.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the project.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The name of the project.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the project.
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
     * List of the project's avatars, returning the avatar size and associated URL.
     *
     * @return ProjectIssueCreateMetadataAvatarUrls
     */
    public function getAvatarUrls(): ProjectIssueCreateMetadataAvatarUrls
    {
        return $this->avatarUrls;
    }
    /**
     * List of the project's avatars, returning the avatar size and associated URL.
     *
     * @param ProjectIssueCreateMetadataAvatarUrls $avatarUrls
     *
     * @return self
     */
    public function setAvatarUrls(ProjectIssueCreateMetadataAvatarUrls $avatarUrls): self
    {
        $this->initialized['avatarUrls'] = true;
        $this->avatarUrls = $avatarUrls;
        return $this;
    }
    /**
     * List of the issue types supported by the project.
     *
     * @return IssueTypeIssueCreateMetadata[]
     */
    public function getIssuetypes(): array
    {
        return $this->issuetypes;
    }
    /**
     * List of the issue types supported by the project.
     *
     * @param IssueTypeIssueCreateMetadata[] $issuetypes
     *
     * @return self
     */
    public function setIssuetypes(array $issuetypes): self
    {
        $this->initialized['issuetypes'] = true;
        $this->issuetypes = $issuetypes;
        return $this;
    }
}
