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

class FieldConfigurationItem
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the field within the field configuration.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the field within the field configuration.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the field is hidden in the field configuration.
     *
     * @var bool
     */
    protected $isHidden;
    /**
     * Whether the field is required in the field configuration.
     *
     * @var bool
     */
    protected $isRequired;
    /**
     * The renderer type for the field within the field configuration.
     *
     * @var string
     */
    protected $renderer;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field within the field configuration.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the field within the field configuration.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the field within the field configuration.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the field within the field configuration.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Whether the field is hidden in the field configuration.
     */
    public function getIsHidden(): bool
    {
        return $this->isHidden;
    }

    /**
     * Whether the field is hidden in the field configuration.
     */
    public function setIsHidden(bool $isHidden): self
    {
        $this->initialized['isHidden'] = true;
        $this->isHidden = $isHidden;

        return $this;
    }

    /**
     * Whether the field is required in the field configuration.
     */
    public function getIsRequired(): bool
    {
        return $this->isRequired;
    }

    /**
     * Whether the field is required in the field configuration.
     */
    public function setIsRequired(bool $isRequired): self
    {
        $this->initialized['isRequired'] = true;
        $this->isRequired = $isRequired;

        return $this;
    }

    /**
     * The renderer type for the field within the field configuration.
     */
    public function getRenderer(): string
    {
        return $this->renderer;
    }

    /**
     * The renderer type for the field within the field configuration.
     */
    public function setRenderer(string $renderer): self
    {
        $this->initialized['renderer'] = true;
        $this->renderer = $renderer;

        return $this;
    }
}
