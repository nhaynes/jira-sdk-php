<?php

namespace JiraSdk\Model;

class JqlQueryOrderByClause
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
     * The list of order-by clause fields and their ordering directives.
     *
     * @var JqlQueryOrderByClauseElement[]
     */
    protected $fields;
    /**
     * The list of order-by clause fields and their ordering directives.
     *
     * @return JqlQueryOrderByClauseElement[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
    /**
     * The list of order-by clause fields and their ordering directives.
     *
     * @param JqlQueryOrderByClauseElement[] $fields
     *
     * @return self
     */
    public function setFields(array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
}
