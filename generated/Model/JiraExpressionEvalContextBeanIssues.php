<?php

namespace JiraSdk\Model;

class JiraExpressionEvalContextBeanIssues extends \ArrayObject
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
     * The JQL query that specifies the set of issues available in the Jira expression.
     *
     * @var JexpIssuesJql
     */
    protected $jql;
    /**
     * The JQL query that specifies the set of issues available in the Jira expression.
     *
     * @return JexpIssuesJql
     */
    public function getJql(): JexpIssuesJql
    {
        return $this->jql;
    }
    /**
     * The JQL query that specifies the set of issues available in the Jira expression.
     *
     * @param JexpIssuesJql $jql
     *
     * @return self
     */
    public function setJql(JexpIssuesJql $jql): self
    {
        $this->initialized['jql'] = true;
        $this->jql = $jql;
        return $this;
    }
}
