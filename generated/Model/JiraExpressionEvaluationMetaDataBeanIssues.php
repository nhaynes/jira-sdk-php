<?php

namespace JiraSdk\Model;

class JiraExpressionEvaluationMetaDataBeanIssues extends \ArrayObject
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
     * The description of the page of issues loaded by the provided JQL query.
     *
     * @var IssuesJqlMetaDataBean
     */
    protected $jql;
    /**
     * The description of the page of issues loaded by the provided JQL query.
     *
     * @return IssuesJqlMetaDataBean
     */
    public function getJql(): IssuesJqlMetaDataBean
    {
        return $this->jql;
    }
    /**
     * The description of the page of issues loaded by the provided JQL query.
     *
     * @param IssuesJqlMetaDataBean $jql
     *
     * @return self
     */
    public function setJql(IssuesJqlMetaDataBean $jql): self
    {
        $this->initialized['jql'] = true;
        $this->jql = $jql;
        return $this;
    }
}
