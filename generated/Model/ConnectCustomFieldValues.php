<?php

namespace JiraSdk\Model;

class ConnectCustomFieldValues
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
     * The list of custom field update details.
     *
     * @var ConnectCustomFieldValue[]
     */
    protected $updateValueList;
    /**
     * The list of custom field update details.
     *
     * @return ConnectCustomFieldValue[]
     */
    public function getUpdateValueList(): array
    {
        return $this->updateValueList;
    }
    /**
     * The list of custom field update details.
     *
     * @param ConnectCustomFieldValue[] $updateValueList
     *
     * @return self
     */
    public function setUpdateValueList(array $updateValueList): self
    {
        $this->initialized['updateValueList'] = true;
        $this->updateValueList = $updateValueList;
        return $this;
    }
}
