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

class FieldValueClause extends \ArrayObject
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
     * The operator between the field and operand.
     *
     * @var string
     */
    protected $operator;
    /**
     * Details of an operand in a JQL clause.
     *
     * @var mixed[]
     */
    protected $operand;

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
     * The operator between the field and operand.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * The operator between the field and operand.
     */
    public function setOperator(string $operator): self
    {
        $this->initialized['operator'] = true;
        $this->operator = $operator;

        return $this;
    }

    /**
     * Details of an operand in a JQL clause.
     *
     * @return mixed[]
     */
    public function getOperand(): iterable
    {
        return $this->operand;
    }

    /**
     * Details of an operand in a JQL clause.
     *
     * @param mixed[] $operand
     */
    public function setOperand(iterable $operand): self
    {
        $this->initialized['operand'] = true;
        $this->operand = $operand;

        return $this;
    }
}
