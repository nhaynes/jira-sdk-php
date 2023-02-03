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

class AddFieldBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the field to add.
     *
     * @var string
     */
    protected $fieldId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field to add.
     */
    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    /**
     * The ID of the field to add.
     */
    public function setFieldId(string $fieldId): self
    {
        $this->initialized['fieldId'] = true;
        $this->fieldId = $fieldId;

        return $this;
    }
}
