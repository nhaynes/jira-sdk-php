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

class JiraExpressionComplexity
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Information that can be used to determine how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) the evaluation of the expression will perform. This information may be a formula or number. For example:
     *  `issues.map(i => i.comments)` performs as many expensive operations as there are issues on the issues list. So this parameter returns `N`, where `N` is the size of issue list.
     *  `new Issue(10010).comments` gets comments for one issue, so its complexity is `2` (`1` to retrieve issue 10010 from the database plus `1` to get its comments).
     */
    public function getExpensiveOperations(): string
    {
        return $this->expensiveOperations;
    }

    /**
     * Information that can be used to determine how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) the evaluation of the expression will perform. This information may be a formula or number. For example:
     *  `issues.map(i => i.comments)` performs as many expensive operations as there are issues on the issues list. So this parameter returns `N`, where `N` is the size of issue list.
     *  `new Issue(10010).comments` gets comments for one issue, so its complexity is `2` (`1` to retrieve issue 10010 from the database plus `1` to get its comments).
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
     */
    public function setVariables(iterable $variables): self
    {
        $this->initialized['variables'] = true;
        $this->variables = $variables;

        return $this;
    }
}
