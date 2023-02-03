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

class ProjectIssueTypeMappings
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The project and issue type mappings.
     *
     * @var ProjectIssueTypeMapping[]
     */
    protected $mappings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The project and issue type mappings.
     *
     * @return ProjectIssueTypeMapping[]
     */
    public function getMappings(): array
    {
        return $this->mappings;
    }

    /**
     * The project and issue type mappings.
     *
     * @param ProjectIssueTypeMapping[] $mappings
     */
    public function setMappings(array $mappings): self
    {
        $this->initialized['mappings'] = true;
        $this->mappings = $mappings;

        return $this;
    }
}
