<?php

namespace JiraSdk\Model;

class ChangedValueBean
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
     * The name of the field changed.
     *
     * @var string
     */
    protected $fieldName;
    /**
     * The value of the field before the change.
     *
     * @var string
     */
    protected $changedFrom;
    /**
     * The value of the field after the change.
     *
     * @var string
     */
    protected $changedTo;
    /**
     * The name of the field changed.
     *
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }
    /**
     * The name of the field changed.
     *
     * @param string $fieldName
     *
     * @return self
     */
    public function setFieldName(string $fieldName): self
    {
        $this->initialized['fieldName'] = true;
        $this->fieldName = $fieldName;
        return $this;
    }
    /**
     * The value of the field before the change.
     *
     * @return string
     */
    public function getChangedFrom(): string
    {
        return $this->changedFrom;
    }
    /**
     * The value of the field before the change.
     *
     * @param string $changedFrom
     *
     * @return self
     */
    public function setChangedFrom(string $changedFrom): self
    {
        $this->initialized['changedFrom'] = true;
        $this->changedFrom = $changedFrom;
        return $this;
    }
    /**
     * The value of the field after the change.
     *
     * @return string
     */
    public function getChangedTo(): string
    {
        return $this->changedTo;
    }
    /**
     * The value of the field after the change.
     *
     * @param string $changedTo
     *
     * @return self
     */
    public function setChangedTo(string $changedTo): self
    {
        $this->initialized['changedTo'] = true;
        $this->changedTo = $changedTo;
        return $this;
    }
}
