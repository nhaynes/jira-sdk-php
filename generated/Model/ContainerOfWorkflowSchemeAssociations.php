<?php

namespace JiraSdk\Model;

class ContainerOfWorkflowSchemeAssociations
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
     * A list of workflow schemes together with projects they are associated with.
     *
     * @var WorkflowSchemeAssociations[]
     */
    protected $values;
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
     *
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
}
