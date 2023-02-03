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

class CustomFieldConfigurations
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of custom field configuration details.
     *
     * @var ContextualConfiguration[]
     */
    protected $configurations;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of custom field configuration details.
     *
     * @return ContextualConfiguration[]
     */
    public function getConfigurations(): array
    {
        return $this->configurations;
    }

    /**
     * The list of custom field configuration details.
     *
     * @param ContextualConfiguration[] $configurations
     */
    public function setConfigurations(array $configurations): self
    {
        $this->initialized['configurations'] = true;
        $this->configurations = $configurations;

        return $this;
    }
}
