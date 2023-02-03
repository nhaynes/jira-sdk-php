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

class ProjectPermissions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether the logged user can edit the project.
     *
     * @var bool
     */
    protected $canEdit;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the logged user can edit the project.
     */
    public function getCanEdit(): bool
    {
        return $this->canEdit;
    }

    /**
     * Whether the logged user can edit the project.
     */
    public function setCanEdit(bool $canEdit): self
    {
        $this->initialized['canEdit'] = true;
        $this->canEdit = $canEdit;

        return $this;
    }
}
