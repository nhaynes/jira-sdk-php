<?php

namespace JiraSdk\Model;

class JiraExpressionComplexity
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
     * Information that can be used to determine how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) the evaluation of the expression will perform. This information may be a formula or number. For example:
     *  `issues.map(i => i.comments)` performs as many expensive operations as there are issues on the issues list. So this parameter returns `N`, where `N` is the size of issue list.
     *  `new Issue(10010).comments` gets comments for one issue, so its complexity is `2` (`1` to retrieve issue 10010 from the database plus `1` to get its comments).
     *
     * @var string
     */
    protected $expensiveOperations;
    /**
     * Variables used in the formula, mapped to the parts of the expression they refer to.
     *
     * @var string[]
     */
    protected $variables;
    /**
     * Information that can be used to determine how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) the evaluation of the expression will perform. This information may be a formula or number. For example:
     *  `issues.map(i => i.comments)` performs as many expensive operations as there are issues on the issues list. So this parameter returns `N`, where `N` is the size of issue list.
     *  `new Issue(10010).comments` gets comments for one issue, so its complexity is `2` (`1` to retrieve issue 10010 from the database plus `1` to get its comments).
     *
     * @return string
     */
    public function getExpensiveOperations(): string
    {
        return $this->expensiveOperations;
    }
    /**
     * Information that can be used to determine how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) the evaluation of the expression will perform. This information may be a formula or number. For example:
     *  `issues.map(i => i.comments)` performs as many expensive operations as there are issues on the issues list. So this parameter returns `N`, where `N` is the size of issue list.
     *  `new Issue(10010).comments` gets comments for one issue, so its complexity is `2` (`1` to retrieve issue 10010 from the database plus `1` to get its comments).
     *
     * @param string $expensiveOperations
     *
     * @return self
     */
    public function setExpensiveOperations(string $expensiveOperations): self
    {
        $this->initialized['expensiveOperations'] = true;
        $this->expensiveOperations = $expensiveOperations;
        return $this;
    }
    /**
     * Variables used in the formula, mapped to the parts of the expression they refer to.
     *
     * @return string[]
     */
    public function getVariables(): iterable
    {
        return $this->variables;
    }
    /**
     * Variables used in the formula, mapped to the parts of the expression they refer to.
     *
     * @param string[] $variables
     *
     * @return self
     */
    public function setVariables(iterable $variables): self
    {
        $this->initialized['variables'] = true;
        $this->variables = $variables;
        return $this;
    }
}
