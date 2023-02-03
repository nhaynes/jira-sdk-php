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

class EntityPropertyDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The entity property ID.
     *
     * @var float
     */
    protected $entityId;
    /**
     * The entity property key.
     *
     * @var string
     */
    protected $key;
    /**
     * The new value of the entity property.
     *
     * @var string
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The entity property ID.
     */
    public function getEntityId(): float
    {
        return $this->entityId;
    }

    /**
     * The entity property ID.
     */
    public function setEntityId(float $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * The entity property key.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The entity property key.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The new value of the entity property.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The new value of the entity property.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
