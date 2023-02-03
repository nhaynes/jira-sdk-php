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

class EntityProperty
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The key of the property. Required on create and update.
     *
     * @var string
     */
    protected $key;
    /**
     * The value of the property. Required on create and update.
     *
     * @var mixed
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The key of the property. Required on create and update.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the property. Required on create and update.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The value of the property. Required on create and update.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * The value of the property. Required on create and update.
     *
     * @param mixed $value
     */
    public function setValue($value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
