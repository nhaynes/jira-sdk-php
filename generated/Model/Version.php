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

class Version
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:.
     *
     *  `operations` Returns the list of operations available for this version.
     *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * Optional for create and update.
     *
     * @var string
     */
    protected $expand;
    /**
     * The URL of the version.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the version.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the version. Optional when creating or updating a version.
     *
     * @var string
     */
    protected $description;
    /**
     * The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * Indicates that the version is archived. Optional when creating or updating a version.
     *
     * @var bool
     */
    protected $archived;
    /**
     * Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version.
     *
     * @var bool
     */
    protected $released;
    /**
     * The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version.
     *
     * @var \DateTime
     */
    protected $startDate;
    /**
     * The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version.
     *
     * @var \DateTime
     */
    protected $releaseDate;
    /**
     * Indicates that the version is overdue.
     *
     * @var bool
     */
    protected $overdue;
    /**
     * The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format.
     *
     * @var string
     */
    protected $userStartDate;
    /**
     * The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format.
     *
     * @var string
     */
    protected $userReleaseDate;
    /**
     * Deprecated. Use `projectId`.
     *
     * @var string
     */
    protected $project;
    /**
     * The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version.
     *
     * @var int
     */
    protected $projectId;
    /**
     * The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version.
     *
     * @var string
     */
    protected $moveUnfixedIssuesTo;
    /**
     * If the expand option `operations` is used, returns the list of operations available for this version.
     *
     * @var SimpleLink[]
     */
    protected $operations;
    /**
     * If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * @var VersionIssuesStatusForFixVersion
     */
    protected $issuesStatusForFixVersion;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:.
     *
     *  `operations` Returns the list of operations available for this version.
     *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * Optional for create and update.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:.
     *
     *  `operations` Returns the list of operations available for this version.
     *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * Optional for create and update.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * The URL of the version.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the version.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the version.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the version.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the version. Optional when creating or updating a version.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the version. Optional when creating or updating a version.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Indicates that the version is archived. Optional when creating or updating a version.
     */
    public function getArchived(): bool
    {
        return $this->archived;
    }

    /**
     * Indicates that the version is archived. Optional when creating or updating a version.
     */
    public function setArchived(bool $archived): self
    {
        $this->initialized['archived'] = true;
        $this->archived = $archived;

        return $this;
    }

    /**
     * Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version.
     */
    public function getReleased(): bool
    {
        return $this->released;
    }

    /**
     * Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version.
     */
    public function setReleased(bool $released): self
    {
        $this->initialized['released'] = true;
        $this->released = $released;

        return $this;
    }

    /**
     * The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version.
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version.
     */
    public function setStartDate(\DateTime $startDate): self
    {
        $this->initialized['startDate'] = true;
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version.
     */
    public function getReleaseDate(): \DateTime
    {
        return $this->releaseDate;
    }

    /**
     * The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version.
     */
    public function setReleaseDate(\DateTime $releaseDate): self
    {
        $this->initialized['releaseDate'] = true;
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Indicates that the version is overdue.
     */
    public function getOverdue(): bool
    {
        return $this->overdue;
    }

    /**
     * Indicates that the version is overdue.
     */
    public function setOverdue(bool $overdue): self
    {
        $this->initialized['overdue'] = true;
        $this->overdue = $overdue;

        return $this;
    }

    /**
     * The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format.
     */
    public function getUserStartDate(): string
    {
        return $this->userStartDate;
    }

    /**
     * The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format.
     */
    public function setUserStartDate(string $userStartDate): self
    {
        $this->initialized['userStartDate'] = true;
        $this->userStartDate = $userStartDate;

        return $this;
    }

    /**
     * The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format.
     */
    public function getUserReleaseDate(): string
    {
        return $this->userReleaseDate;
    }

    /**
     * The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format.
     */
    public function setUserReleaseDate(string $userReleaseDate): self
    {
        $this->initialized['userReleaseDate'] = true;
        $this->userReleaseDate = $userReleaseDate;

        return $this;
    }

    /**
     * Deprecated. Use `projectId`.
     */
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * Deprecated. Use `projectId`.
     */
    public function setProject(string $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }

    /**
     * The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version.
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version.
     */
    public function setProjectId(int $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version.
     */
    public function getMoveUnfixedIssuesTo(): string
    {
        return $this->moveUnfixedIssuesTo;
    }

    /**
     * The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version.
     */
    public function setMoveUnfixedIssuesTo(string $moveUnfixedIssuesTo): self
    {
        $this->initialized['moveUnfixedIssuesTo'] = true;
        $this->moveUnfixedIssuesTo = $moveUnfixedIssuesTo;

        return $this;
    }

    /**
     * If the expand option `operations` is used, returns the list of operations available for this version.
     *
     * @return SimpleLink[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * If the expand option `operations` is used, returns the list of operations available for this version.
     *
     * @param SimpleLink[] $operations
     */
    public function setOperations(array $operations): self
    {
        $this->initialized['operations'] = true;
        $this->operations = $operations;

        return $this;
    }

    /**
     * If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
     */
    public function getIssuesStatusForFixVersion(): VersionIssuesStatusForFixVersion
    {
        return $this->issuesStatusForFixVersion;
    }

    /**
     * If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.
     */
    public function setIssuesStatusForFixVersion(VersionIssuesStatusForFixVersion $issuesStatusForFixVersion): self
    {
        $this->initialized['issuesStatusForFixVersion'] = true;
        $this->issuesStatusForFixVersion = $issuesStatusForFixVersion;

        return $this;
    }
}
