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

class Resolution
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the issue resolution.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the issue resolution.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the issue resolution.
     *
     * @var string
     */
    protected $description;
    /**
     * The name of the issue resolution.
     *
     * @var string
     */
    protected $name;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the issue resolution.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue resolution.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the issue resolution.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue resolution.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the issue resolution.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue resolution.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The name of the issue resolution.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue resolution.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
