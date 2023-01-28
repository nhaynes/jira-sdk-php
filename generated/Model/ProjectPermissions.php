<?php

namespace JiraSdk\Model;

class ProjectPermissions
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
     * Whether the logged user can edit the project.
     *
     * @var bool
     */
    protected $canEdit;
    /**
     * Whether the logged user can edit the project.
     *
     * @return bool
     */
    public function getCanEdit(): bool
    {
        return $this->canEdit;
    }
    /**
     * Whether the logged user can edit the project.
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
}
