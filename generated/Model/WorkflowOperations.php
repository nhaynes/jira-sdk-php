<?php

namespace JiraSdk\Model;

class WorkflowOperations
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
     * Whether the workflow can be updated.
     *
     * @var bool
     */
    protected $canEdit;
    /**
     * Whether the workflow can be deleted.
     *
     * @var bool
     */
    protected $canDelete;
    /**
     * Whether the workflow can be updated.
     *
     * @return bool
     */
    public function getCanEdit(): bool
    {
        return $this->canEdit;
    }
    /**
     * Whether the workflow can be updated.
     *
     * @param bool $canEdit
     *
     * @return self
     */
    public function setCanEdit(bool $canEdit): self
    {
        $this->initialized['canEdit'] = true;
        $this->canEdit = $canEdit;
        return $this;
    }
    /**
     * Whether the workflow can be deleted.
     *
     * @return bool
     */
    public function getCanDelete(): bool
    {
        return $this->canDelete;
    }
    /**
     * Whether the workflow can be deleted.
     *
     * @param bool $canDelete
     *
     * @return self
     */
    public function setCanDelete(bool $canDelete): self
    {
        $this->initialized['canDelete'] = true;
        $this->canDelete = $canDelete;
        return $this;
    }
}
