<?php

namespace JiraSdk\Model;

class CustomFieldContextSingleUserPickerDefaults extends \ArrayObject
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
     * The ID of the context.
     *
     * @var string
     */
    protected $contextId;
    /**
     * The ID of the default user.
     *
     * @var string
     */
    protected $accountId;
    /**
     * Filter for a User Picker (single) custom field.
     *
     * @var UserFilter
     */
    protected $userFilter;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The ID of the context.
     *
     * @return string
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }
    /**
     * The ID of the context.
     *
     * @param string $contextId
     *
     * @return self
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;
        return $this;
    }
    /**
     * The ID of the default user.
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
    /**
     * The ID of the default user.
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
    /**
     * Filter for a User Picker (single) custom field.
     *
     * @return UserFilter
     */
    public function getUserFilter(): UserFilter
    {
        return $this->userFilter;
    }
    /**
     * Filter for a User Picker (single) custom field.
     *
     * @param UserFilter $userFilter
     *
     * @return self
     */
    public function setUserFilter(UserFilter $userFilter): self
    {
        $this->initialized['userFilter'] = true;
        $this->userFilter = $userFilter;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
