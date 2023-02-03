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

class FoundUsers
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var UserPickerUser[]
     */
    protected $users;
    /**
     * The total number of users found in the search.
     *
     * @var int
     */
    protected $total;
    /**
     * Header text indicating the number of users in the response and the total number of users found in the search.
     *
     * @var string
     */
    protected $header;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return UserPickerUser[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param UserPickerUser[] $users
     */
    public function setUsers(array $users): self
    {
        $this->initialized['users'] = true;
        $this->users = $users;

        return $this;
    }

    /**
     * The total number of users found in the search.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The total number of users found in the search.
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * Header text indicating the number of users in the response and the total number of users found in the search.
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * Header text indicating the number of users in the response and the total number of users found in the search.
     */
    public function setHeader(string $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;

        return $this;
    }
}
