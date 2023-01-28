<?php

namespace JiraSdk\Model;

class JiraExpressionEvalRequestBean
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
     * The Jira expression to evaluate.
     *
     * @var string
     */
    protected $expression;
    /**
     * The context in which the Jira expression is evaluated.
     *
     * @var JiraExpressionEvalRequestBeanContext
     */
    protected $context;
    /**
     * The Jira expression to evaluate.
     *
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }
    /**
     * The Jira expression to evaluate.
     *
     * @param string $expression
     *
     * @return self
     */
    public function setExpression(string $expression): self
    {
        $this->initialized['expression'] = true;
        $this->expression = $expression;
        return $this;
    }
    /**
     * The context in which the Jira expression is evaluated.
     *
     * @return JiraExpressionEvalRequestBeanContext
     */
    public function getContext(): JiraExpressionEvalRequestBeanContext
    {
        return $this->context;
    }
    /**
     * The context in which the Jira expression is evaluated.
     *
     * @param JiraExpressionEvalRequestBeanContext $context
     *
     * @return self
     */
    public function setContext(JiraExpressionEvalRequestBeanContext $context): self
    {
        $this->initialized['context'] = true;
        $this->context = $context;
        return $this;
    }
}
