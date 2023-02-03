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

class IssueCommentListRequestBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of comment IDs. A maximum of 1000 IDs can be specified.
     *
     * @var int[]
     */
    protected $ids;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of comment IDs. A maximum of 1000 IDs can be specified.
     *
     * @return int[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * The list of comment IDs. A maximum of 1000 IDs can be specified.
     *
     * @param int[] $ids
     */
    public function setIds(array $ids): self
    {
        $this->initialized['ids'] = true;
        $this->ids = $ids;

        return $this;
    }
}
