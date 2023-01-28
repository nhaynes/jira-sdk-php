<?php

namespace JiraSdk\Model;

class FieldConfigurationSchemeProjectAssociation
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
     * The ID of the field configuration scheme. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
     *
     * @var string
     */
    protected $fieldConfigurationSchemeId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The ID of the field configuration scheme. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
     *
     * @return string
     */
    public function getFieldConfigurationSchemeId(): string
    {
        return $this->fieldConfigurationSchemeId;
    }
    /**
     * The ID of the field configuration scheme. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
     *
     * @param string $fieldConfigurationSchemeId
     *
     * @return self
     */
    public function setFieldConfigurationSchemeId(string $fieldConfigurationSchemeId): self
    {
        $this->initialized['fieldConfigurationSchemeId'] = true;
        $this->fieldConfigurationSchemeId = $fieldConfigurationSchemeId;
        return $this;
    }
    /**
     * The ID of the project.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     * The ID of the project.
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
}
