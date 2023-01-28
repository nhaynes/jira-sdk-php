<?php

namespace JiraSdk\Model;

class JqlQuery
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
     * A JQL query clause.
     *
     * @var CompoundClause|FieldValueClause|FieldWasClause|FieldChangedClause
     */
    protected $where;
    /**
     * Details of the order-by JQL clause.
     *
     * @var JqlQueryOrderByClause
     */
    protected $orderBy;
    /**
     * A JQL query clause.
     *
     * @return CompoundClause|FieldValueClause|FieldWasClause|FieldChangedClause
     */
    public function getWhere()
    {
        return $this->where;
    }
    /**
     * A JQL query clause.
     *
     * @param CompoundClause|FieldValueClause|FieldWasClause|FieldChangedClause $where
     *
     * @return self
     */
    public function setWhere($where): self
    {
        $this->initialized['where'] = true;
        $this->where = $where;
        return $this;
    }
    /**
     * Details of the order-by JQL clause.
     *
     * @return JqlQueryOrderByClause
     */
    public function getOrderBy(): JqlQueryOrderByClause
    {
        return $this->orderBy;
    }
    /**
     * Details of the order-by JQL clause.
     *
     * @param JqlQueryOrderByClause $orderBy
     *
     * @return self
     */
    public function setOrderBy(JqlQueryOrderByClause $orderBy): self
    {
        $this->initialized['orderBy'] = true;
        $this->orderBy = $orderBy;
        return $this;
    }
}
