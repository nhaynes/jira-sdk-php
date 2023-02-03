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

class ChangeDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the field changed.
     *
     * @var string
     */
    protected $field;
    /**
     * The type of the field changed.
     *
     * @var string
     */
    protected $fieldtype;
    /**
     * The ID of the field changed.
     *
     * @var string
     */
    protected $fieldId;
    /**
     * The details of the original value.
     *
     * @var string
     */
    protected $from;
    /**
     * The details of the original value as a string.
     *
     * @var string
     */
    protected $fromString;
    /**
     * The details of the new value.
     *
     * @var string
     */
    protected $to;
    /**
     * The details of the new value as a string.
     *
     * @var string
     */
    protected $toString;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the field changed.
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * The name of the field changed.
     */
    public function setField(string $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;

        return $this;
    }

    /**
     * The type of the field changed.
     */
    public function getFieldtype(): string
    {
        return $this->fieldtype;
    }

    /**
     * The type of the field changed.
     */
    public function setFieldtype(string $fieldtype): self
    {
        $this->initialized['fieldtype'] = true;
        $this->fieldtype = $fieldtype;

        return $this;
    }

    /**
     * The ID of the field changed.
     */
    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    /**
     * The ID of the field changed.
     */
    public function setFieldId(string $fieldId): self
    {
        $this->initialized['fieldId'] = true;
        $this->fieldId = $fieldId;

        return $this;
    }

    /**
     * The details of the original value.
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * The details of the original value.
     */
    public function setFrom(string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;

        return $this;
    }

    /**
     * The details of the original value as a string.
     */
    public function getFromString(): string
    {
        return $this->fromString;
    }

    /**
     * The details of the original value as a string.
     */
    public function setFromString(string $fromString): self
    {
        $this->initialized['fromString'] = true;
        $this->fromString = $fromString;

        return $this;
    }

    /**
     * The details of the new value.
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * The details of the new value.
     */
    public function setTo(string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;

        return $this;
    }

    /**
     * The details of the new value as a string.
     */
    public function getToString(): string
    {
        return $this->toString;
    }

    /**
     * The details of the new value as a string.
     */
    public function setToString(string $toString): self
    {
        $this->initialized['toString'] = true;
        $this->toString = $toString;

        return $this;
    }
}
