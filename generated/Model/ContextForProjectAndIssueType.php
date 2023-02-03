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

class ContextForProjectAndIssueType
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the custom field context.
     *
     * @var string
     */
    protected $contextId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
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

    /**
     * The ID of the issue type.
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }

    /**
     * The ID of the issue type.
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;

        return $this;
    }

    /**
     * The ID of the custom field context.
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }

    /**
     * The ID of the custom field context.
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;

        return $this;
    }
}
