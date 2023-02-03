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

class StatusScope
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
     *
     * @var string
     */
    protected $type;
    /**
     * Project ID details.
     *
     * @var ProjectId
     */
    protected $project;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Project ID details.
     */
    public function getProject(): ProjectId
    {
        return $this->project;
    }

    /**
     * Project ID details.
     */
    public function setProject(ProjectId $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }
}
