<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueMultiUserPicker extends \ArrayObject
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
     * The IDs of the default users.
     *
     * @var string[]
     */
    protected $accountIds;
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
     * The IDs of the default users.
     *
     * @return string[]
     */
    public function getAccountIds(): array
    {
        return $this->accountIds;
    }
    /**
     * The IDs of the default users.
     *
     * @param string[] $accountIds
     *
     * @return self
     */
    public function setAccountIds(array $accountIds): self
    {
        $this->initialized['accountIds'] = true;
        $this->accountIds = $accountIds;
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
