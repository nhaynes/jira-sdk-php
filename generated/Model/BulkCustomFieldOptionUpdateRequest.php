<?php

namespace JiraSdk\Model;

class BulkCustomFieldOptionUpdateRequest
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
     * Details of the options to update.
     *
     * @var CustomFieldOptionUpdate[]
     */
    protected $options;
    /**
     * Details of the options to update.
     *
     * @return CustomFieldOptionUpdate[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }
    /**
     * Details of the options to update.
     *
     * @param CustomFieldOptionUpdate[] $options
     *
     * @return self
     */
    public function setOptions(array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
}
