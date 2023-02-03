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

class WorkflowId
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the workflow.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether the workflow is in the draft state.
     *
     * @var bool
     */
    protected $draft;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the workflow.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the workflow.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Whether the workflow is in the draft state.
     */
    public function getDraft(): bool
    {
        return $this->draft;
    }

    /**
     * Whether the workflow is in the draft state.
     */
    public function setDraft(bool $draft): self
    {
        $this->initialized['draft'] = true;
        $this->draft = $draft;

        return $this;
    }
}
