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

class PermissionSchemeScope extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The type of scope.
     *
     * @var string
     */
    protected $type;
    /**
     * The project the item has scope in.
     *
     * @var ScopeProject
     */
    protected $project;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The type of scope.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of scope.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The project the item has scope in.
     */
    public function getProject(): ScopeProject
    {
        return $this->project;
    }

    /**
     * The project the item has scope in.
     */
    public function setProject(ScopeProject $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }
}
