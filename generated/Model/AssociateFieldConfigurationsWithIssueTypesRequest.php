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

class AssociateFieldConfigurationsWithIssueTypesRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Field configuration to issue type mappings.
     *
     * @var FieldConfigurationToIssueTypeMapping[]
     */
    protected $mappings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Field configuration to issue type mappings.
     *
     * @return FieldConfigurationToIssueTypeMapping[]
     */
    public function getMappings(): array
    {
        return $this->mappings;
    }

    /**
     * Field configuration to issue type mappings.
     *
     * @param FieldConfigurationToIssueTypeMapping[] $mappings
     */
    public function setMappings(array $mappings): self
    {
        $this->initialized['mappings'] = true;
        $this->mappings = $mappings;

        return $this;
    }
}
