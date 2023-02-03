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

class IssueChangelogIds
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of changelog IDs.
     *
     * @var int[]
     */
    protected $changelogIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of changelog IDs.
     *
     * @return int[]
     */
    public function getChangelogIds(): array
    {
        return $this->changelogIds;
    }

    /**
     * The list of changelog IDs.
     *
     * @param int[] $changelogIds
     */
    public function setChangelogIds(array $changelogIds): self
    {
        $this->initialized['changelogIds'] = true;
        $this->changelogIds = $changelogIds;

        return $this;
    }
}
