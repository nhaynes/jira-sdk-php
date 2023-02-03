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

class IssueBeanEditmeta extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of editable field details.
     *
     * @var FieldMetadata[]
     */
    protected $fields;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of editable field details.
     *
     * @return FieldMetadata[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }

    /**
     * A list of editable field details.
     *
     * @param FieldMetadata[] $fields
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }
}
