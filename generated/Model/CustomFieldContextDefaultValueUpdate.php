<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueUpdate
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
     * @var mixed[]
     */
    protected $defaultValues;
    /**
     *
     *
     * @return mixed[]
     */
    public function getDefaultValues(): array
    {
        return $this->defaultValues;
    }
    /**
     *
     *
     * @param mixed[] $defaultValues
     *
     * @return self
     */
    public function setDefaultValues(array $defaultValues): self
    {
        $this->initialized['defaultValues'] = true;
        $this->defaultValues = $defaultValues;
        return $this;
    }
}
