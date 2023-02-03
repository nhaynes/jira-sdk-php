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

class WorkflowRules
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The workflow transition rule conditions tree.
     *
     * @var mixed
     */
    protected $conditionsTree;
    /**
     * The workflow validators.
     *
     * @var WorkflowTransitionRule[]
     */
    protected $validators;
    /**
     * The workflow post functions.
     *
     * @var WorkflowTransitionRule[]
     */
    protected $postFunctions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The workflow transition rule conditions tree.
     *
     * @return mixed
     */
    public function getConditionsTree()
    {
        return $this->conditionsTree;
    }

    /**
     * The workflow transition rule conditions tree.
     *
     * @param mixed $conditionsTree
     */
    public function setConditionsTree($conditionsTree): self
    {
        $this->initialized['conditionsTree'] = true;
        $this->conditionsTree = $conditionsTree;

        return $this;
    }

    /**
     * The workflow validators.
     *
     * @return WorkflowTransitionRule[]
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * The workflow validators.
     *
     * @param WorkflowTransitionRule[] $validators
     */
    public function setValidators(array $validators): self
    {
        $this->initialized['validators'] = true;
        $this->validators = $validators;

        return $this;
    }

    /**
     * The workflow post functions.
     *
     * @return WorkflowTransitionRule[]
     */
    public function getPostFunctions(): array
    {
        return $this->postFunctions;
    }

    /**
     * The workflow post functions.
     *
     * @param WorkflowTransitionRule[] $postFunctions
     */
    public function setPostFunctions(array $postFunctions): self
    {
        $this->initialized['postFunctions'] = true;
        $this->postFunctions = $postFunctions;

        return $this;
    }
}
