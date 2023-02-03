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

class OrderOfIssueTypes
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of the issue type IDs to move. The order of the issue type IDs in the list is the order they are given after the move.
     *
     * @var string[]
     */
    protected $issueTypeIds;
    /**
     * The ID of the issue type to place the moved issue types after. Required if `position` isn't provided.
     *
     * @var string
     */
    protected $after;
    /**
     * The position the issue types should be moved to. Required if `after` isn't provided.
     *
     * @var string
     */
    protected $position;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of the issue type IDs to move. The order of the issue type IDs in the list is the order they are given after the move.
     *
     * @return string[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }

    /**
     * A list of the issue type IDs to move. The order of the issue type IDs in the list is the order they are given after the move.
     *
     * @param string[] $issueTypeIds
     */
    public function setIssueTypeIds(array $issueTypeIds): self
    {
        $this->initialized['issueTypeIds'] = true;
        $this->issueTypeIds = $issueTypeIds;

        return $this;
    }

    /**
     * The ID of the issue type to place the moved issue types after. Required if `position` isn't provided.
     */
    public function getAfter(): string
    {
        return $this->after;
    }

    /**
     * The ID of the issue type to place the moved issue types after. Required if `position` isn't provided.
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;

        return $this;
    }

    /**
     * The position the issue types should be moved to. Required if `after` isn't provided.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * The position the issue types should be moved to. Required if `after` isn't provided.
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }
}
