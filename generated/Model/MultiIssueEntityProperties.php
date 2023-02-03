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

class MultiIssueEntityProperties
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of issue IDs and their respective properties.
     *
     * @var IssueEntityPropertiesForMultiUpdate[]
     */
    protected $issues;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of issue IDs and their respective properties.
     *
     * @return IssueEntityPropertiesForMultiUpdate[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * A list of issue IDs and their respective properties.
     *
     * @param IssueEntityPropertiesForMultiUpdate[] $issues
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;

        return $this;
    }
}
