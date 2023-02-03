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

class PermittedProjects
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of projects.
     *
     * @var ProjectIdentifierBean[]
     */
    protected $projects;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of projects.
     *
     * @return ProjectIdentifierBean[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * A list of projects.
     *
     * @param ProjectIdentifierBean[] $projects
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;

        return $this;
    }
}
