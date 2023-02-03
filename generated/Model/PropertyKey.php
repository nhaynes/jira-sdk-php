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

class PropertyKey
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the property.
     *
     * @var string
     */
    protected $self;
    /**
     * The key of the property.
     *
     * @var string
     */
    protected $key;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the property.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the property.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The key of the property.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the property.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }
}
