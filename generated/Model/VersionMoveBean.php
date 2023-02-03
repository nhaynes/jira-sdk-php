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

class VersionMoveBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL (self link) of the version after which to place the moved version. Cannot be used with `position`.
     *
     * @var string
     */
    protected $after;
    /**
     * An absolute position in which to place the moved version. Cannot be used with `after`.
     *
     * @var string
     */
    protected $position;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL (self link) of the version after which to place the moved version. Cannot be used with `position`.
     */
    public function getAfter(): string
    {
        return $this->after;
    }

    /**
     * The URL (self link) of the version after which to place the moved version. Cannot be used with `position`.
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;

        return $this;
    }

    /**
     * An absolute position in which to place the moved version. Cannot be used with `after`.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * An absolute position in which to place the moved version. Cannot be used with `after`.
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }
}
