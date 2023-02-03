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

class JiraExpressionEvalRequestBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The Jira expression to evaluate.
     *
     * @var string
     */
    protected $expression;
    /**
     * The context in which the Jira expression is evaluated.
     *
     * @var JiraExpressionEvalRequestBeanContext
     */
    protected $context;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The Jira expression to evaluate.
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * The Jira expression to evaluate.
     */
    public function setExpression(string $expression): self
    {
        $this->initialized['expression'] = true;
        $this->expression = $expression;

        return $this;
    }

    /**
     * The context in which the Jira expression is evaluated.
     */
    public function getContext(): JiraExpressionEvalRequestBeanContext
    {
        return $this->context;
    }

    /**
     * The context in which the Jira expression is evaluated.
     */
    public function setContext(JiraExpressionEvalRequestBeanContext $context): self
    {
        $this->initialized['context'] = true;
        $this->context = $context;

        return $this;
    }
}
