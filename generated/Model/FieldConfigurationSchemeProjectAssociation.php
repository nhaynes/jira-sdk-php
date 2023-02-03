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

class FieldConfigurationSchemeProjectAssociation
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field configuration scheme. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
     */
    public function getFieldConfigurationSchemeId(): string
    {
        return $this->fieldConfigurationSchemeId;
    }

    /**
     * The ID of the field configuration scheme. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
     */
    public function setFieldConfigurationSchemeId(string $fieldConfigurationSchemeId): self
    {
        $this->initialized['fieldConfigurationSchemeId'] = true;
        $this->fieldConfigurationSchemeId = $fieldConfigurationSchemeId;

        return $this;
    }

    /**
     * The ID of the project.
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }

    /**
     * The ID of the project.
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }
}
