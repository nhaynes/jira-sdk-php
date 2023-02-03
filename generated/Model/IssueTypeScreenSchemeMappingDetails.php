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

class IssueTypeScreenSchemeMappingDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
     *
     * @var IssueTypeScreenSchemeMapping[]
     */
    protected $issueTypeMappings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
     *
     * @return IssueTypeScreenSchemeMapping[]
     */
    public function getIssueTypeMappings(): array
    {
        return $this->issueTypeMappings;
    }

    /**
     * The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
     *
     * @param IssueTypeScreenSchemeMapping[] $issueTypeMappings
     */
    public function setIssueTypeMappings(array $issueTypeMappings): self
    {
        $this->initialized['issueTypeMappings'] = true;
        $this->issueTypeMappings = $issueTypeMappings;

        return $this;
    }
}
