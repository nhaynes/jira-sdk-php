<?php

namespace JiraSdk\Model;

class BulkCustomFieldOptionCreateRequest
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
     * Details of options to create.
     *
     * @var CustomFieldOptionCreate[]
     */
    protected $options;
    /**
     * Details of options to create.
     *
     * @return CustomFieldOptionCreate[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }
    /**
     * Details of options to create.
     *
     * @param CustomFieldOptionCreate[] $options
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
