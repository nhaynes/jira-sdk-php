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

class StatusDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the status.
     *
     * @var string
     */
    protected $self;
    /**
     * The description of the status.
     *
     * @var string
     */
    protected $description;
    /**
     * The URL of the icon used to represent the status.
     *
     * @var string
     */
    protected $iconUrl;
    /**
     * The name of the status.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the status.
     *
     * @var string
     */
    protected $id;
    /**
     * The category assigned to the status.
     *
     * @var StatusDetailsStatusCategory
     */
    protected $statusCategory;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the status.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the status.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The description of the status.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the status.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The URL of the icon used to represent the status.
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * The URL of the icon used to represent the status.
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->initialized['iconUrl'] = true;
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * The name of the status.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the status.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The ID of the status.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the status.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The category assigned to the status.
     */
    public function getStatusCategory(): StatusDetailsStatusCategory
    {
        return $this->statusCategory;
    }

    /**
     * The category assigned to the status.
     */
    public function setStatusCategory(StatusDetailsStatusCategory $statusCategory): self
    {
        $this->initialized['statusCategory'] = true;
        $this->statusCategory = $statusCategory;

        return $this;
    }
}
