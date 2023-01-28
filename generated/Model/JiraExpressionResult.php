<?php

namespace JiraSdk\Model;

class JiraExpressionResult
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
     * The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.)
     *
     * @var mixed
     */
    protected $value;
    /**
     * Contains various characteristics of the performed expression evaluation.
     *
     * @var JiraExpressionResultMeta
     */
    protected $meta;
    /**
     * The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.)
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.)
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * Contains various characteristics of the performed expression evaluation.
     *
     * @return JiraExpressionResultMeta
     */
    public function getMeta(): JiraExpressionResultMeta
    {
        return $this->meta;
    }
    /**
     * Contains various characteristics of the performed expression evaluation.
     *
     * @param JiraExpressionResultMeta $meta
     *
     * @return self
     */
    public function setMeta(JiraExpressionResultMeta $meta): self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;
        return $this;
    }
}
