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

class ProjectType
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The key of the project type.
     *
     * @var string
     */
    protected $key;
    /**
     * The formatted key of the project type.
     *
     * @var string
     */
    protected $formattedKey;
    /**
     * The key of the project type's description.
     *
     * @var string
     */
    protected $descriptionI18nKey;
    /**
     * The icon of the project type.
     *
     * @var string
     */
    protected $icon;
    /**
     * The color of the project type.
     *
     * @var string
     */
    protected $color;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The key of the project type.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the project type.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The formatted key of the project type.
     */
    public function getFormattedKey(): string
    {
        return $this->formattedKey;
    }

    /**
     * The formatted key of the project type.
     */
    public function setFormattedKey(string $formattedKey): self
    {
        $this->initialized['formattedKey'] = true;
        $this->formattedKey = $formattedKey;

        return $this;
    }

    /**
     * The key of the project type's description.
     */
    public function getDescriptionI18nKey(): string
    {
        return $this->descriptionI18nKey;
    }

    /**
     * The key of the project type's description.
     */
    public function setDescriptionI18nKey(string $descriptionI18nKey): self
    {
        $this->initialized['descriptionI18nKey'] = true;
        $this->descriptionI18nKey = $descriptionI18nKey;

        return $this;
    }

    /**
     * The icon of the project type.
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * The icon of the project type.
     */
    public function setIcon(string $icon): self
    {
        $this->initialized['icon'] = true;
        $this->icon = $icon;

        return $this;
    }

    /**
     * The color of the project type.
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * The color of the project type.
     */
    public function setColor(string $color): self
    {
        $this->initialized['color'] = true;
        $this->color = $color;

        return $this;
    }
}
