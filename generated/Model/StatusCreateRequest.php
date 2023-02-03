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

class StatusCreateRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Details of the statuses being created.
     *
     * @var StatusCreate[]
     */
    protected $statuses;
    /**
     * The scope of the status.
     *
     * @var StatusScope
     */
    protected $scope;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details of the statuses being created.
     *
     * @return StatusCreate[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * Details of the statuses being created.
     *
     * @param StatusCreate[] $statuses
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;

        return $this;
    }

    /**
     * The scope of the status.
     */
    public function getScope(): StatusScope
    {
        return $this->scope;
    }

    /**
     * The scope of the status.
     */
    public function setScope(StatusScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }
}
