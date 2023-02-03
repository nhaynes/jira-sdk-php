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

class IssueTypeScreenSchemeProjectAssociation
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type screen scheme.
     *
     * @var string
     */
    protected $issueTypeScreenSchemeId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type screen scheme.
     */
    public function getIssueTypeScreenSchemeId(): string
    {
        return $this->issueTypeScreenSchemeId;
    }

    /**
     * The ID of the issue type screen scheme.
     */
    public function setIssueTypeScreenSchemeId(string $issueTypeScreenSchemeId): self
    {
        $this->initialized['issueTypeScreenSchemeId'] = true;
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;

        return $this;
    }

    /**
     * The ID of the project.
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }

    /**
     * The ID of the project.
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }
}
