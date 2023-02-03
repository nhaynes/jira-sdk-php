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

class SearchAutoCompleteFilter
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of project IDs used to filter the visible field details returned.
     *
     * @var int[]
     */
    protected $projectIds;
    /**
     * Include collapsed fields for fields that have non-unique names.
     *
     * @var bool
     */
    protected $includeCollapsedFields = false;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of project IDs used to filter the visible field details returned.
     *
     * @return int[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }

    /**
     * List of project IDs used to filter the visible field details returned.
     *
     * @param int[] $projectIds
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;

        return $this;
    }

    /**
     * Include collapsed fields for fields that have non-unique names.
     */
    public function getIncludeCollapsedFields(): bool
    {
        return $this->includeCollapsedFields;
    }

    /**
     * Include collapsed fields for fields that have non-unique names.
     */
    public function setIncludeCollapsedFields(bool $includeCollapsedFields): self
    {
        $this->initialized['includeCollapsedFields'] = true;
        $this->includeCollapsedFields = $includeCollapsedFields;

        return $this;
    }
}
