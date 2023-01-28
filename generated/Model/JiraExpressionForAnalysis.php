<?php

namespace JiraSdk\Model;

class JiraExpressionForAnalysis
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
     * The list of Jira expressions to analyse.
     *
     * @var string[]
     */
    protected $expressions;
    /**
     * Context variables and their types. The type checker assumes that [common context variables](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#context-variables), such as `issue` or `project`, are available in context and sets their type. Use this property to override the default types or provide details of new variables.
     *
     * @var string[]
     */
    protected $contextVariables;
    /**
     * The list of Jira expressions to analyse.
     *
     * @return string[]
     */
    public function getExpressions(): array
    {
        return $this->expressions;
    }
    /**
     * The list of Jira expressions to analyse.
     *
     * @param string[] $expressions
     *
     * @return self
     */
    public function setExpressions(array $expressions): self
    {
        $this->initialized['expressions'] = true;
        $this->expressions = $expressions;
        return $this;
    }
    /**
     * Context variables and their types. The type checker assumes that [common context variables](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#context-variables), such as `issue` or `project`, are available in context and sets their type. Use this property to override the default types or provide details of new variables.
     *
     * @return string[]
     */
    public function getContextVariables(): iterable
    {
        return $this->contextVariables;
    }
    /**
     * Context variables and their types. The type checker assumes that [common context variables](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#context-variables), such as `issue` or `project`, are available in context and sets their type. Use this property to override the default types or provide details of new variables.
     *
     * @param string[] $contextVariables
     *
     * @return self
     */
    public function setContextVariables(iterable $contextVariables): self
    {
        $this->initialized['contextVariables'] = true;
        $this->contextVariables = $contextVariables;
        return $this;
    }
}
