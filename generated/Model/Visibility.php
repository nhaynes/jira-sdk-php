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

class Visibility extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether visibility of this item is restricted to a group or role.
     *
     * @var string
     */
    protected $type;
    /**
     * The name of the group or role that visibility of this item is restricted to. Please note that the name of a group is mutable, to reliably identify a group use `identifier`.
     *
     * @var string
     */
    protected $value;
    /**
     * The ID of the group or the name of the role that visibility of this item is restricted to.
     *
     * @var string|null
     */
    protected $identifier;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether visibility of this item is restricted to a group or role.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Whether visibility of this item is restricted to a group or role.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The name of the group or role that visibility of this item is restricted to. Please note that the name of a group is mutable, to reliably identify a group use `identifier`.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The name of the group or role that visibility of this item is restricted to. Please note that the name of a group is mutable, to reliably identify a group use `identifier`.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The ID of the group or the name of the role that visibility of this item is restricted to.
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * The ID of the group or the name of the role that visibility of this item is restricted to.
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->initialized['identifier'] = true;
        $this->identifier = $identifier;

        return $this;
    }
}
