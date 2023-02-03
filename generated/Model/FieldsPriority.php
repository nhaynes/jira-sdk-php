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

class FieldsPriority extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the issue priority.
     *
     * @var string
     */
    protected $self;
    /**
     * The color used to indicate the issue priority.
     *
     * @var string
     */
    protected $statusColor;
    /**
     * The description of the issue priority.
     *
     * @var string
     */
    protected $description;
    /**
     * The URL of the icon for the issue priority.
     *
     * @var string
     */
    protected $iconUrl;
    /**
     * The name of the issue priority.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the issue priority.
     *
     * @var string
     */
    protected $id;
    /**
     * Whether this priority is the default.
     *
     * @var bool
     */
    protected $isDefault;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the issue priority.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue priority.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The color used to indicate the issue priority.
     */
    public function getStatusColor(): string
    {
        return $this->statusColor;
    }

    /**
     * The color used to indicate the issue priority.
     */
    public function setStatusColor(string $statusColor): self
    {
        $this->initialized['statusColor'] = true;
        $this->statusColor = $statusColor;

        return $this;
    }

    /**
     * The description of the issue priority.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue priority.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The URL of the icon for the issue priority.
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * The URL of the icon for the issue priority.
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->initialized['iconUrl'] = true;
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * The name of the issue priority.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue priority.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The ID of the issue priority.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue priority.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Whether this priority is the default.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * Whether this priority is the default.
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;

        return $this;
    }
}
