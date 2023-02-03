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

class PageOfComments extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The index of the first item returned.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of items that could be returned.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The number of items returned.
     *
     * @var int
     */
    protected $total;
    /**
     * The list of comments.
     *
     * @var Comment[]
     */
    protected $comments;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The index of the first item returned.
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }

    /**
     * The index of the first item returned.
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * The maximum number of items that could be returned.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * The maximum number of items that could be returned.
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;

        return $this;
    }

    /**
     * The number of items returned.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The number of items returned.
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * The list of comments.
     *
     * @return Comment[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * The list of comments.
     *
     * @param Comment[] $comments
     */
    public function setComments(array $comments): self
    {
        $this->initialized['comments'] = true;
        $this->comments = $comments;

        return $this;
    }
}
