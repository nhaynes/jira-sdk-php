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

class ChangedValueBean
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
    protected $fieldName;
    /**
     * The value of the field before the change.
     *
     * @var string
     */
    protected $changedFrom;
    /**
     * The value of the field after the change.
     *
     * @var string
     */
    protected $changedTo;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the field changed.
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * The name of the field changed.
     */
    public function setFieldName(string $fieldName): self
    {
        $this->initialized['fieldName'] = true;
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * The value of the field before the change.
     */
    public function getChangedFrom(): string
    {
        return $this->changedFrom;
    }

    /**
     * The value of the field before the change.
     */
    public function setChangedFrom(string $changedFrom): self
    {
        $this->initialized['changedFrom'] = true;
        $this->changedFrom = $changedFrom;

        return $this;
    }

    /**
     * The value of the field after the change.
     */
    public function getChangedTo(): string
    {
        return $this->changedTo;
    }

    /**
     * The value of the field after the change.
     */
    public function setChangedTo(string $changedTo): self
    {
        $this->initialized['changedTo'] = true;
        $this->changedTo = $changedTo;

        return $this;
    }
}
