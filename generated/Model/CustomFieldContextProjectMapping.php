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

class CustomFieldContextProjectMapping
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the context.
     *
     * @var string
     */
    protected $contextId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * Whether context is global.
     *
     * @var bool
     */
    protected $isGlobalContext;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the context.
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }

    /**
     * The ID of the context.
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;

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

    /**
     * Whether context is global.
     */
    public function getIsGlobalContext(): bool
    {
        return $this->isGlobalContext;
    }

    /**
     * Whether context is global.
     */
    public function setIsGlobalContext(bool $isGlobalContext): self
    {
        $this->initialized['isGlobalContext'] = true;
        $this->isGlobalContext = $isGlobalContext;

        return $this;
    }
}
