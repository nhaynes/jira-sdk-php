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

class IssueTypeIdsToRemove
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of issue type IDs. Must contain unique values not longer than 255 characters and not be empty. Maximum of 100 IDs.
     *
     * @var string[]
     */
    protected $issueTypeIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of issue type IDs. Must contain unique values not longer than 255 characters and not be empty. Maximum of 100 IDs.
     *
     * @return string[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }

    /**
     * The list of issue type IDs. Must contain unique values not longer than 255 characters and not be empty. Maximum of 100 IDs.
     *
     * @param string[] $issueTypeIds
     */
    public function setIssueTypeIds(array $issueTypeIds): self
    {
        $this->initialized['issueTypeIds'] = true;
        $this->issueTypeIds = $issueTypeIds;

        return $this;
    }
}
