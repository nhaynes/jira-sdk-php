<?php

namespace JiraSdk\Model;

class FieldConfigurationItemsDetails
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
     * Details of fields in a field configuration.
     *
     * @var FieldConfigurationItem[]
     */
    protected $fieldConfigurationItems;
    /**
     * Details of fields in a field configuration.
     *
     * @return FieldConfigurationItem[]
     */
    public function getFieldConfigurationItems(): array
    {
        return $this->fieldConfigurationItems;
    }
    /**
     * Details of fields in a field configuration.
     *
     * @param FieldConfigurationItem[] $fieldConfigurationItems
     *
     * @return self
     */
    public function setFieldConfigurationItems(array $fieldConfigurationItems): self
    {
        $this->initialized['fieldConfigurationItems'] = true;
        $this->fieldConfigurationItems = $fieldConfigurationItems;
        return $this;
    }
}
