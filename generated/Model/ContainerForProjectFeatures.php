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

class ContainerForProjectFeatures
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The project features.
     *
     * @var ProjectFeature[]
     */
    protected $features;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The project features.
     *
     * @return ProjectFeature[]
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * The project features.
     *
     * @param ProjectFeature[] $features
     */
    public function setFeatures(array $features): self
    {
        $this->initialized['features'] = true;
        $this->features = $features;

        return $this;
    }
}
