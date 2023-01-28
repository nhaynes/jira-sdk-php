<?php

namespace JiraSdk\Model;

class JqlQueryOrderByClauseElement
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
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @var JqlQueryField
     */
    protected $field;
    /**
     * The direction in which to order the results.
     *
     * @var string
     */
    protected $direction;
    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @return JqlQueryField
     */
    public function getField(): JqlQueryField
    {
        return $this->field;
    }
    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @param JqlQueryField $field
     *
     * @return self
     */
    public function setField(JqlQueryField $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;
        return $this;
    }
    /**
     * The direction in which to order the results.
     *
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }
    /**
     * The direction in which to order the results.
     *
     * @param string $direction
     *
     * @return self
     */
    public function setDirection(string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
}
