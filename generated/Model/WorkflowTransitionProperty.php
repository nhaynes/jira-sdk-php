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

class WorkflowTransitionProperty extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The key of the transition property. Also known as the name of the transition property.
     *
     * @var string
     */
    protected $key;
    /**
     * The value of the transition property.
     *
     * @var string
     */
    protected $value;
    /**
     * The ID of the transition property.
     *
     * @var string
     */
    protected $id;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The key of the transition property. Also known as the name of the transition property.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the transition property. Also known as the name of the transition property.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The value of the transition property.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The value of the transition property.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The ID of the transition property.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the transition property.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }
}
