<?php

namespace JiraSdk\Model;

class UserMigrationBean
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
     * @var string
     */
    protected $key;
    /**
     *
     *
     * @var string
     */
    protected $username;
    /**
     *
     *
     * @var string
     */
    protected $accountId;
    /**
     *
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     *
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
    /**
     *
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
    /**
     *
     *
     * @param string $accountId
     *
     * @return self
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;
        return $this;
    }
}
