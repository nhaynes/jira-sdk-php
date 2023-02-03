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

class ContainerOfWorkflowSchemeAssociations
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of workflow schemes together with projects they are associated with.
     *
     * @var WorkflowSchemeAssociations[]
     */
    protected $values;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of workflow schemes together with projects they are associated with.
     *
     * @return WorkflowSchemeAssociations[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * A list of workflow schemes together with projects they are associated with.
     *
     * @param WorkflowSchemeAssociations[] $values
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }
}
