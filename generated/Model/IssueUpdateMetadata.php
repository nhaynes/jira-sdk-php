<?php

namespace JiraSdk\Model;

class IssueUpdateMetadata extends \ArrayObject
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
     * @var FieldMetadata[]
     */
    protected $fields;
    /**
     *
     *
     * @return FieldMetadata[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }
    /**
     *
     *
     * @param FieldMetadata[] $fields
     *
     * @return self
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
}
