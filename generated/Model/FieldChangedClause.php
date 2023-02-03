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

class FieldChangedClause extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @var JqlQueryField
     */
    protected $field;
    /**
     * The operator applied to the field.
     *
     * @var string
     */
    protected $operator;
    /**
     * The list of time predicates.
     *
     * @var JqlQueryClauseTimePredicate[]
     */
    protected $predicates;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     */
    public function getField(): JqlQueryField
    {
        return $this->field;
    }

    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     */
    public function setField(JqlQueryField $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;

        return $this;
    }

    /**
     * The operator applied to the field.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * The operator applied to the field.
     */
    public function setOperator(string $operator): self
    {
        $this->initialized['operator'] = true;
        $this->operator = $operator;

        return $this;
    }

    /**
     * The list of time predicates.
     *
     * @return JqlQueryClauseTimePredicate[]
     */
    public function getPredicates(): array
    {
        return $this->predicates;
    }

    /**
     * The list of time predicates.
     *
     * @param JqlQueryClauseTimePredicate[] $predicates
     */
    public function setPredicates(array $predicates): self
    {
        $this->initialized['predicates'] = true;
        $this->predicates = $predicates;

        return $this;
    }
}
