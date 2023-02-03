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

class ProjectFeatureState
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The feature state.
     *
     * @var string
     */
    protected $state;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The feature state.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * The feature state.
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }
}
