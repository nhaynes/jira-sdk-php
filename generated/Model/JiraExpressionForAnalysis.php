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

class JiraExpressionForAnalysis
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setContextVariables(iterable $contextVariables): self
    {
        $this->initialized['contextVariables'] = true;
        $this->contextVariables = $contextVariables;

        return $this;
    }
}
