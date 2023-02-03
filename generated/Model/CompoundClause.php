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

class CompoundClause extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of nested clauses.
     *
     * @var CompoundClause[]|FieldValueClause[]|FieldWasClause[]|FieldChangedClause[]
     */
    protected $clauses;
    /**
     * The operator between the clauses.
     *
     * @var string
     */
    protected $operator;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of nested clauses.
     *
     * @return CompoundClause[]|FieldValueClause[]|FieldWasClause[]|FieldChangedClause[]
     */
    public function getClauses(): array
    {
        return $this->clauses;
    }

    /**
     * The list of nested clauses.
     *
     * @param CompoundClause[]|FieldValueClause[]|FieldWasClause[]|FieldChangedClause[] $clauses
     */
    public function setClauses(array $clauses): self
    {
        $this->initialized['clauses'] = true;
        $this->clauses = $clauses;

        return $this;
    }

    /**
     * The operator between the clauses.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * The operator between the clauses.
     */
    public function setOperator(string $operator): self
    {
        $this->initialized['operator'] = true;
        $this->operator = $operator;

        return $this;
    }
}
