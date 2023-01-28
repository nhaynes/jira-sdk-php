<?php

namespace JiraSdk\Model;

class FieldConfigurationSchemeProjects
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
     * Details of a field configuration scheme.
     *
     * @var FieldConfigurationScheme
     */
    protected $fieldConfigurationScheme;
    /**
     * The IDs of projects using the field configuration scheme.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * Details of a field configuration scheme.
     *
     * @return FieldConfigurationScheme
     */
    public function getFieldConfigurationScheme(): FieldConfigurationScheme
    {
        return $this->fieldConfigurationScheme;
    }
    /**
     * Details of a field configuration scheme.
     *
     * @param FieldConfigurationScheme $fieldConfigurationScheme
     *
     * @return self
     */
    public function setFieldConfigurationScheme(FieldConfigurationScheme $fieldConfigurationScheme): self
    {
        $this->initialized['fieldConfigurationScheme'] = true;
        $this->fieldConfigurationScheme = $fieldConfigurationScheme;
        return $this;
    }
    /**
     * The IDs of projects using the field configuration scheme.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }
    /**
     * The IDs of projects using the field configuration scheme.
     *
     * @param string[] $projectIds
     *
     * @return self
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;
        return $this;
    }
}
