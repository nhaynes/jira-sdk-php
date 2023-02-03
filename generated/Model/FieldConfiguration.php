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

class FieldConfiguration
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the field configuration.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the field configuration.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the field configuration.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the field configuration is the default.
     *
     * @var bool
     */
    protected $isDefault;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field configuration.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the field configuration.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the field configuration.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the field configuration.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the field configuration.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the field configuration.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Whether the field configuration is the default.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * Whether the field configuration is the default.
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;

        return $this;
    }
}
