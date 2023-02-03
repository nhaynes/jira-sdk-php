<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class JqlQuery
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setWhere($where): self
    {
        $this->initialized['where'] = true;
        $this->where = $where;

        return $this;
    }

    /**
     * Details of the order-by JQL clause.
     */
    public function getOrderBy(): JqlQueryOrderByClause
    {
        return $this->orderBy;
    }

    /**
     * Details of the order-by JQL clause.
     */
    public function setOrderBy(JqlQueryOrderByClause $orderBy): self
    {
        $this->initialized['orderBy'] = true;
        $this->orderBy = $orderBy;

        return $this;
    }
}
