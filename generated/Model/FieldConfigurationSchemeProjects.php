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

class FieldConfigurationSchemeProjects
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details of a field configuration scheme.
     */
    public function getFieldConfigurationScheme(): FieldConfigurationScheme
    {
        return $this->fieldConfigurationScheme;
    }

    /**
     * Details of a field configuration scheme.
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
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;

        return $this;
    }
}
