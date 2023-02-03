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

class StatusDetailsStatusCategory extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the status category.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the status category.
     *
     * @var int
     */
    protected $id;
    /**
     * The key of the status category.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the color used to represent the status category.
     *
     * @var string
     */
    protected $colorName;
    /**
     * The name of the status category.
     *
     * @var string
     */
    protected $name;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the status category.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the status category.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the status category.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the status category.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the status category.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the status category.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the color used to represent the status category.
     */
    public function getColorName(): string
    {
        return $this->colorName;
    }

    /**
     * The name of the color used to represent the status category.
     */
    public function setColorName(string $colorName): self
    {
        $this->initialized['colorName'] = true;
        $this->colorName = $colorName;

        return $this;
    }

    /**
     * The name of the status category.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the status category.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
