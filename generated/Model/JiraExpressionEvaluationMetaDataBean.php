<?php

namespace JiraSdk\Model;

class JiraExpressionEvaluationMetaDataBean
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
     * Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression.
     *
     * @var JiraExpressionEvaluationMetaDataBeanComplexity
     */
    protected $complexity;
    /**
     * Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here.
     *
     * @var JiraExpressionEvaluationMetaDataBeanIssues
     */
    protected $issues;
    /**
     * Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression.
     *
     * @return JiraExpressionEvaluationMetaDataBeanComplexity
     */
    public function getComplexity(): JiraExpressionEvaluationMetaDataBeanComplexity
    {
        return $this->complexity;
    }
    /**
     * Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression.
     *
     * @param JiraExpressionEvaluationMetaDataBeanComplexity $complexity
     *
     * @return self
     */
    public function setComplexity(JiraExpressionEvaluationMetaDataBeanComplexity $complexity): self
    {
        $this->initialized['complexity'] = true;
        $this->complexity = $complexity;
        return $this;
    }
    /**
     * Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here.
     *
     * @return JiraExpressionEvaluationMetaDataBeanIssues
     */
    public function getIssues(): JiraExpressionEvaluationMetaDataBeanIssues
    {
        return $this->issues;
    }
    /**
     * Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here.
     *
     * @param JiraExpressionEvaluationMetaDataBeanIssues $issues
     *
     * @return self
     */
    public function setIssues(JiraExpressionEvaluationMetaDataBeanIssues $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;
        return $this;
    }
}
