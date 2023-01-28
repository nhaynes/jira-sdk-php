<?php

namespace JiraSdk\Model;

class FoundUsers
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     *
     *
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
    /**
     *
     *
     * @return UserPickerUser[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }
    /**
     *
     *
     * @param UserPickerUser[] $users
     *
     * @return self
     */
    public function setUsers(array $users): self
    {
        $this->initialized['users'] = true;
        $this->users = $users;
        return $this;
    }
    /**
     * The total number of users found in the search.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    /**
     * The total number of users found in the search.
     *
     * @param int $total
     *
     * @return self
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
    /**
     * Header text indicating the number of users in the response and the total number of users found in the search.
     *
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }
    /**
     * Header text indicating the number of users in the response and the total number of users found in the search.
     *
     * @param string $header
     *
     * @return self
     */
    public function setHeader(string $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
        return $this;
    }
}
