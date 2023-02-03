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

class MoveFieldBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided.
     *
     * @var string
     */
    protected $after;
    /**
     * The named position to which the screen tab field should be moved. Required if `after` isn't provided.
     *
     * @var string
     */
    protected $position;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided.
     */
    public function getAfter(): string
    {
        return $this->after;
    }

    /**
     * The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided.
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;

        return $this;
    }

    /**
     * The named position to which the screen tab field should be moved. Required if `after` isn't provided.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * The named position to which the screen tab field should be moved. Required if `after` isn't provided.
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }
}
