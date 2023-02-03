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

class JiraExpressionResultMeta extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression.
     */
    public function getComplexity(): JiraExpressionEvaluationMetaDataBeanComplexity
    {
        return $this->complexity;
    }

    /**
     * Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression.
     */
    public function setComplexity(JiraExpressionEvaluationMetaDataBeanComplexity $complexity): self
    {
        $this->initialized['complexity'] = true;
        $this->complexity = $complexity;

        return $this;
    }

    /**
     * Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here.
     */
    public function getIssues(): JiraExpressionEvaluationMetaDataBeanIssues
    {
        return $this->issues;
    }

    /**
     * Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here.
     */
    public function setIssues(JiraExpressionEvaluationMetaDataBeanIssues $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;

        return $this;
    }
}
