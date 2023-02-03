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

class ProjectIssueCreateMetadata
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Expand options that include additional project issue create metadata details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional project issue create metadata details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * The URL of the project.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the project.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the project.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the project.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the project.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the project.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the project.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the project.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * List of the project's avatars, returning the avatar size and associated URL.
     */
    public function getAvatarUrls(): ProjectIssueCreateMetadataAvatarUrls
    {
        return $this->avatarUrls;
    }

    /**
     * List of the project's avatars, returning the avatar size and associated URL.
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
     */
    public function setIssuetypes(array $issuetypes): self
    {
        $this->initialized['issuetypes'] = true;
        $this->issuetypes = $issuetypes;

        return $this;
    }
}
