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

class WorkflowOperations
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether the workflow can be updated.
     *
     * @var bool
     */
    protected $canEdit;
    /**
     * Whether the workflow can be deleted.
     *
     * @var bool
     */
    protected $canDelete;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the workflow can be updated.
     */
    public function getCanEdit(): bool
    {
        return $this->canEdit;
    }

    /**
     * Whether the workflow can be updated.
     */
    public function setCanEdit(bool $canEdit): self
    {
        $this->initialized['canEdit'] = true;
        $this->canEdit = $canEdit;

        return $this;
    }

    /**
     * Whether the workflow can be deleted.
     */
    public function getCanDelete(): bool
    {
        return $this->canDelete;
    }

    /**
     * Whether the workflow can be deleted.
     */
    public function setCanDelete(bool $canDelete): self
    {
        $this->initialized['canDelete'] = true;
        $this->canDelete = $canDelete;

        return $this;
    }
}
