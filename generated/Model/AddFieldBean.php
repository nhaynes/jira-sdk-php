<?php

namespace JiraSdk\Model;

class AddFieldBean
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
     * The ID of the field to add.
     *
     * @var string
     */
    protected $fieldId;
    /**
     * The ID of the field to add.
     *
     * @return string
     */
    public function getFieldId(): string
    {
        return $this->fieldId;
    }
    /**
     * The ID of the field to add.
     *
     * @param string $fieldId
     *
     * @return self
     */
    public function setFieldId(string $fieldId): self
    {
        $this->initialized['fieldId'] = true;
        $this->fieldId = $fieldId;
        return $this;
    }
}
