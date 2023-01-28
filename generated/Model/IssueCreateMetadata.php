<?php

namespace JiraSdk\Model;

class IssueCreateMetadata
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
    /**
     * Expand options that include additional project details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional project details in the response.
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
