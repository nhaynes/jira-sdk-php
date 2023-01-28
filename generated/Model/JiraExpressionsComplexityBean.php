<?php

namespace JiraSdk\Model;

class JiraExpressionsComplexityBean
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
     * The number of steps it took to evaluate the expression, where a step is a high-level operation performed by the expression. A step is an operation such as arithmetic, accessing a property, accessing a context variable, or calling a function.
     *
     * @var JiraExpressionsComplexityBeanSteps
     */
    protected $steps;
    /**
     * The number of expensive operations executed while evaluating the expression. Expensive operations are those that load additional data, such as entity properties, comments, or custom fields.
     *
     * @var JiraExpressionsComplexityBeanExpensiveOperations
     */
    protected $expensiveOperations;
    /**
     * The number of Jira REST API beans returned in the response.
     *
     * @var JiraExpressionsComplexityBeanBeans
     */
    protected $beans;
    /**
     * The number of primitive values returned in the response.
     *
     * @var JiraExpressionsComplexityBeanPrimitiveValues
     */
    protected $primitiveValues;
    /**
     * The number of steps it took to evaluate the expression, where a step is a high-level operation performed by the expression. A step is an operation such as arithmetic, accessing a property, accessing a context variable, or calling a function.
     *
     * @return JiraExpressionsComplexityBeanSteps
     */
    public function getSteps(): JiraExpressionsComplexityBeanSteps
    {
        return $this->steps;
    }
    /**
     * The number of steps it took to evaluate the expression, where a step is a high-level operation performed by the expression. A step is an operation such as arithmetic, accessing a property, accessing a context variable, or calling a function.
     *
     * @param JiraExpressionsComplexityBeanSteps $steps
     *
     * @return self
     */
    public function setSteps(JiraExpressionsComplexityBeanSteps $steps): self
    {
        $this->initialized['steps'] = true;
        $this->steps = $steps;
        return $this;
    }
    /**
     * The number of expensive operations executed while evaluating the expression. Expensive operations are those that load additional data, such as entity properties, comments, or custom fields.
     *
     * @return JiraExpressionsComplexityBeanExpensiveOperations
     */
    public function getExpensiveOperations(): JiraExpressionsComplexityBeanExpensiveOperations
    {
        return $this->expensiveOperations;
    }
    /**
     * The number of expensive operations executed while evaluating the expression. Expensive operations are those that load additional data, such as entity properties, comments, or custom fields.
     *
     * @param JiraExpressionsComplexityBeanExpensiveOperations $expensiveOperations
     *
     * @return self
     */
    public function setExpensiveOperations(JiraExpressionsComplexityBeanExpensiveOperations $expensiveOperations): self
    {
        $this->initialized['expensiveOperations'] = true;
        $this->expensiveOperations = $expensiveOperations;
        return $this;
    }
    /**
     * The number of Jira REST API beans returned in the response.
     *
     * @return JiraExpressionsComplexityBeanBeans
     */
    public function getBeans(): JiraExpressionsComplexityBeanBeans
    {
        return $this->beans;
    }
    /**
     * The number of Jira REST API beans returned in the response.
     *
     * @param JiraExpressionsComplexityBeanBeans $beans
     *
     * @return self
     */
    public function setBeans(JiraExpressionsComplexityBeanBeans $beans): self
    {
        $this->initialized['beans'] = true;
        $this->beans = $beans;
        return $this;
    }
    /**
     * The number of primitive values returned in the response.
     *
     * @return JiraExpressionsComplexityBeanPrimitiveValues
     */
    public function getPrimitiveValues(): JiraExpressionsComplexityBeanPrimitiveValues
    {
        return $this->primitiveValues;
    }
    /**
     * The number of primitive values returned in the response.
     *
     * @param JiraExpressionsComplexityBeanPrimitiveValues $primitiveValues
     *
     * @return self
     */
    public function setPrimitiveValues(JiraExpressionsComplexityBeanPrimitiveValues $primitiveValues): self
    {
        $this->initialized['primitiveValues'] = true;
        $this->primitiveValues = $primitiveValues;
        return $this;
    }
}
