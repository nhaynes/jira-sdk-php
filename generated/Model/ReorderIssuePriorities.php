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

class ReorderIssuePriorities
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of issue IDs to be reordered. Cannot contain duplicates nor after ID.
     *
     * @var string[]
     */
    protected $ids;
    /**
     * The ID of the priority. Required if `position` isn't provided.
     *
     * @var string
     */
    protected $after;
    /**
     * The position for issue priorities to be moved to. Required if `after` isn't provided.
     *
     * @var string
     */
    protected $position;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of issue IDs to be reordered. Cannot contain duplicates nor after ID.
     *
     * @return string[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * The list of issue IDs to be reordered. Cannot contain duplicates nor after ID.
     *
     * @param string[] $ids
     */
    public function setIds(array $ids): self
    {
        $this->initialized['ids'] = true;
        $this->ids = $ids;

        return $this;
    }

    /**
     * The ID of the priority. Required if `position` isn't provided.
     */
    public function getAfter(): string
    {
        return $this->after;
    }

    /**
     * The ID of the priority. Required if `position` isn't provided.
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;

        return $this;
    }

    /**
     * The position for issue priorities to be moved to. Required if `after` isn't provided.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * The position for issue priorities to be moved to. Required if `after` isn't provided.
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }
}
