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

class IssueCreateMetadata
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Expand options that include additional project details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * List of projects and their issue creation metadata.
     *
     * @var ProjectIssueCreateMetadata[]
     */
    protected $projects;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Expand options that include additional project details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional project details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * List of projects and their issue creation metadata.
     *
     * @return ProjectIssueCreateMetadata[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * List of projects and their issue creation metadata.
     *
     * @param ProjectIssueCreateMetadata[] $projects
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;

        return $this;
    }
}
