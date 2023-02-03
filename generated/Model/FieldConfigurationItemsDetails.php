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

class FieldConfigurationItemsDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Details of fields in a field configuration.
     *
     * @var FieldConfigurationItem[]
     */
    protected $fieldConfigurationItems;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details of fields in a field configuration.
     *
     * @return FieldConfigurationItem[]
     */
    public function getFieldConfigurationItems(): array
    {
        return $this->fieldConfigurationItems;
    }

    /**
     * Details of fields in a field configuration.
     *
     * @param FieldConfigurationItem[] $fieldConfigurationItems
     */
    public function setFieldConfigurationItems(array $fieldConfigurationItems): self
    {
        $this->initialized['fieldConfigurationItems'] = true;
        $this->fieldConfigurationItems = $fieldConfigurationItems;

        return $this;
    }
}
