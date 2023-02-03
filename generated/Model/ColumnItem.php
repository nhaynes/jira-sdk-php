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

class ColumnItem
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The issue navigator column label.
     *
     * @var string
     */
    protected $label;
    /**
     * The issue navigator column value.
     *
     * @var string
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The issue navigator column label.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * The issue navigator column label.
     */
    public function setLabel(string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * The issue navigator column value.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The issue navigator column value.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
