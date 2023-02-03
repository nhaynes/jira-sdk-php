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

class PropertyKeys
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Property key details.
     *
     * @var PropertyKey[]
     */
    protected $keys;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Property key details.
     *
     * @return PropertyKey[]
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * Property key details.
     *
     * @param PropertyKey[] $keys
     */
    public function setKeys(array $keys): self
    {
        $this->initialized['keys'] = true;
        $this->keys = $keys;

        return $this;
    }
}
