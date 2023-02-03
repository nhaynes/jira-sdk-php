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

class PublishDraftWorkflowScheme
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Mappings of statuses to new statuses for issue types.
     *
     * @var StatusMapping[]
     */
    protected $statusMappings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Mappings of statuses to new statuses for issue types.
     *
     * @return StatusMapping[]
     */
    public function getStatusMappings(): array
    {
        return $this->statusMappings;
    }

    /**
     * Mappings of statuses to new statuses for issue types.
     *
     * @param StatusMapping[] $statusMappings
     */
    public function setStatusMappings(array $statusMappings): self
    {
        $this->initialized['statusMappings'] = true;
        $this->statusMappings = $statusMappings;

        return $this;
    }
}
