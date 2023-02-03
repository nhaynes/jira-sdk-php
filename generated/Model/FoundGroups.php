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

class FoundGroups
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Header text indicating the number of groups in the response and the total number of groups found in the search.
     *
     * @var string
     */
    protected $header;
    /**
     * The total number of groups found in the search.
     *
     * @var int
     */
    protected $total;
    /**
     * @var FoundGroup[]
     */
    protected $groups;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Header text indicating the number of groups in the response and the total number of groups found in the search.
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * Header text indicating the number of groups in the response and the total number of groups found in the search.
     */
    public function setHeader(string $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;

        return $this;
    }

    /**
     * The total number of groups found in the search.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The total number of groups found in the search.
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * @return FoundGroup[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @param FoundGroup[] $groups
     */
    public function setGroups(array $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;

        return $this;
    }
}
