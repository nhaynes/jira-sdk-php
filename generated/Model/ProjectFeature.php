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

class ProjectFeature
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the project.
     *
     * @var int
     */
    protected $projectId;
    /**
     * The state of the feature. When updating the state of a feature, only ENABLED and DISABLED are supported. Responses can contain all values.
     *
     * @var string
     */
    protected $state;
    /**
     * Whether the state of the feature can be updated.
     *
     * @var bool
     */
    protected $toggleLocked;
    /**
     * The key of the feature.
     *
     * @var string
     */
    protected $feature;
    /**
     * List of keys of the features required to enable the feature.
     *
     * @var string[]
     */
    protected $prerequisites;
    /**
     * Localized display name for the feature.
     *
     * @var string
     */
    protected $localisedName;
    /**
     * Localized display description for the feature.
     *
     * @var string
     */
    protected $localisedDescription;
    /**
     * URI for the image representing the feature.
     *
     * @var string
     */
    protected $imageUri;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the project.
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * The ID of the project.
     */
    public function setProjectId(int $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * The state of the feature. When updating the state of a feature, only ENABLED and DISABLED are supported. Responses can contain all values.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * The state of the feature. When updating the state of a feature, only ENABLED and DISABLED are supported. Responses can contain all values.
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * Whether the state of the feature can be updated.
     */
    public function getToggleLocked(): bool
    {
        return $this->toggleLocked;
    }

    /**
     * Whether the state of the feature can be updated.
     */
    public function setToggleLocked(bool $toggleLocked): self
    {
        $this->initialized['toggleLocked'] = true;
        $this->toggleLocked = $toggleLocked;

        return $this;
    }

    /**
     * The key of the feature.
     */
    public function getFeature(): string
    {
        return $this->feature;
    }

    /**
     * The key of the feature.
     */
    public function setFeature(string $feature): self
    {
        $this->initialized['feature'] = true;
        $this->feature = $feature;

        return $this;
    }

    /**
     * List of keys of the features required to enable the feature.
     *
     * @return string[]
     */
    public function getPrerequisites(): array
    {
        return $this->prerequisites;
    }

    /**
     * List of keys of the features required to enable the feature.
     *
     * @param string[] $prerequisites
     */
    public function setPrerequisites(array $prerequisites): self
    {
        $this->initialized['prerequisites'] = true;
        $this->prerequisites = $prerequisites;

        return $this;
    }

    /**
     * Localized display name for the feature.
     */
    public function getLocalisedName(): string
    {
        return $this->localisedName;
    }

    /**
     * Localized display name for the feature.
     */
    public function setLocalisedName(string $localisedName): self
    {
        $this->initialized['localisedName'] = true;
        $this->localisedName = $localisedName;

        return $this;
    }

    /**
     * Localized display description for the feature.
     */
    public function getLocalisedDescription(): string
    {
        return $this->localisedDescription;
    }

    /**
     * Localized display description for the feature.
     */
    public function setLocalisedDescription(string $localisedDescription): self
    {
        $this->initialized['localisedDescription'] = true;
        $this->localisedDescription = $localisedDescription;

        return $this;
    }

    /**
     * URI for the image representing the feature.
     */
    public function getImageUri(): string
    {
        return $this->imageUri;
    }

    /**
     * URI for the image representing the feature.
     */
    public function setImageUri(string $imageUri): self
    {
        $this->initialized['imageUri'] = true;
        $this->imageUri = $imageUri;

        return $this;
    }
}
