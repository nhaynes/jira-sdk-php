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

class JiraExpressionEvalContextBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The issue that is available under the `issue` variable when evaluating the expression.
     *
     * @var JiraExpressionEvalContextBeanIssue
     */
    protected $issue;
    /**
     * The collection of issues that is available under the `issues` variable when evaluating the expression.
     *
     * @var JiraExpressionEvalContextBeanIssues
     */
    protected $issues;
    /**
     * The project that is available under the `project` variable when evaluating the expression.
     *
     * @var JiraExpressionEvalContextBeanProject
     */
    protected $project;
    /**
     * The ID of the sprint that is available under the `sprint` variable when evaluating the expression.
     *
     * @var int
     */
    protected $sprint;
    /**
     * The ID of the board that is available under the `board` variable when evaluating the expression.
     *
     * @var int
     */
    protected $board;
    /**
     * The ID of the service desk that is available under the `serviceDesk` variable when evaluating the expression.
     *
     * @var int
     */
    protected $serviceDesk;
    /**
     * The ID of the customer request that is available under the `customerRequest` variable when evaluating the expression. This is the same as the ID of the underlying Jira issue, but the customer request context variable will have a different type.
     *
     * @var int
     */
    protected $customerRequest;
    /**
     * Custom context variables and their types. These variable types are available for use in a custom context:
     *  `user`: A [user](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user) specified as an Atlassian account ID.
     *  `issue`: An [issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue) specified by ID or key. All the fields of the issue object are available in the Jira expression.
     *  `json`: A JSON object containing custom content.
     *  `list`: A JSON list of `user`, `issue`, or `json` variable types.
     *
     * @var CustomContextVariable[]
     */
    protected $custom;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The issue that is available under the `issue` variable when evaluating the expression.
     */
    public function getIssue(): JiraExpressionEvalContextBeanIssue
    {
        return $this->issue;
    }

    /**
     * The issue that is available under the `issue` variable when evaluating the expression.
     */
    public function setIssue(JiraExpressionEvalContextBeanIssue $issue): self
    {
        $this->initialized['issue'] = true;
        $this->issue = $issue;

        return $this;
    }

    /**
     * The collection of issues that is available under the `issues` variable when evaluating the expression.
     */
    public function getIssues(): JiraExpressionEvalContextBeanIssues
    {
        return $this->issues;
    }

    /**
     * The collection of issues that is available under the `issues` variable when evaluating the expression.
     */
    public function setIssues(JiraExpressionEvalContextBeanIssues $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;

        return $this;
    }

    /**
     * The project that is available under the `project` variable when evaluating the expression.
     */
    public function getProject(): JiraExpressionEvalContextBeanProject
    {
        return $this->project;
    }

    /**
     * The project that is available under the `project` variable when evaluating the expression.
     */
    public function setProject(JiraExpressionEvalContextBeanProject $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }

    /**
     * The ID of the sprint that is available under the `sprint` variable when evaluating the expression.
     */
    public function getSprint(): int
    {
        return $this->sprint;
    }

    /**
     * The ID of the sprint that is available under the `sprint` variable when evaluating the expression.
     */
    public function setSprint(int $sprint): self
    {
        $this->initialized['sprint'] = true;
        $this->sprint = $sprint;

        return $this;
    }

    /**
     * The ID of the board that is available under the `board` variable when evaluating the expression.
     */
    public function getBoard(): int
    {
        return $this->board;
    }

    /**
     * The ID of the board that is available under the `board` variable when evaluating the expression.
     */
    public function setBoard(int $board): self
    {
        $this->initialized['board'] = true;
        $this->board = $board;

        return $this;
    }

    /**
     * The ID of the service desk that is available under the `serviceDesk` variable when evaluating the expression.
     */
    public function getServiceDesk(): int
    {
        return $this->serviceDesk;
    }

    /**
     * The ID of the service desk that is available under the `serviceDesk` variable when evaluating the expression.
     */
    public function setServiceDesk(int $serviceDesk): self
    {
        $this->initialized['serviceDesk'] = true;
        $this->serviceDesk = $serviceDesk;

        return $this;
    }

    /**
     * The ID of the customer request that is available under the `customerRequest` variable when evaluating the expression. This is the same as the ID of the underlying Jira issue, but the customer request context variable will have a different type.
     */
    public function getCustomerRequest(): int
    {
        return $this->customerRequest;
    }

    /**
     * The ID of the customer request that is available under the `customerRequest` variable when evaluating the expression. This is the same as the ID of the underlying Jira issue, but the customer request context variable will have a different type.
     */
    public function setCustomerRequest(int $customerRequest): self
    {
        $this->initialized['customerRequest'] = true;
        $this->customerRequest = $customerRequest;

        return $this;
    }

    /**
     * Custom context variables and their types. These variable types are available for use in a custom context:
     *  `user`: A [user](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user) specified as an Atlassian account ID.
     *  `issue`: An [issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue) specified by ID or key. All the fields of the issue object are available in the Jira expression.
     *  `json`: A JSON object containing custom content.
     *  `list`: A JSON list of `user`, `issue`, or `json` variable types.
     *
     * @return CustomContextVariable[]
     */
    public function getCustom(): array
    {
        return $this->custom;
    }

    /**
     * Custom context variables and their types. These variable types are available for use in a custom context:
     *  `user`: A [user](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user) specified as an Atlassian account ID.
     *  `issue`: An [issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue) specified by ID or key. All the fields of the issue object are available in the Jira expression.
     *  `json`: A JSON object containing custom content.
     *  `list`: A JSON list of `user`, `issue`, or `json` variable types.
     *
     * @param CustomContextVariable[] $custom
     */
    public function setCustom(array $custom): self
    {
        $this->initialized['custom'] = true;
        $this->custom = $custom;

        return $this;
    }
}
