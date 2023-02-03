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

class IssueFieldOptionConfiguration
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects.
     *
     * @var IssueFieldOptionConfigurationScope
     */
    protected $scope;
    /**
     * DEPRECATED.
     *
     * @var string[]
     */
    protected $attributes;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects.
     */
    public function getScope(): IssueFieldOptionConfigurationScope
    {
        return $this->scope;
    }

    /**
     * Defines the projects that the option is available in. If the scope is not defined, then the option is available in all projects.
     */
    public function setScope(IssueFieldOptionConfigurationScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * DEPRECATED.
     *
     * @return string[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * DEPRECATED.
     *
     * @param string[] $attributes
     */
    public function setAttributes(array $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;

        return $this;
    }
}
