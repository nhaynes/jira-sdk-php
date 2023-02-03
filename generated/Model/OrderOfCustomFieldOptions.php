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

class OrderOfCustomFieldOptions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of IDs of custom field options to move. The order of the custom field option IDs in the list is the order they are given after the move. The list must contain custom field options or cascading options, but not both.
     *
     * @var string[]
     */
    protected $customFieldOptionIds;
    /**
     * The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided.
     *
     * @var string
     */
    protected $after;
    /**
     * The position the custom field options should be moved to. Required if `after` isn't provided.
     *
     * @var string
     */
    protected $position;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of IDs of custom field options to move. The order of the custom field option IDs in the list is the order they are given after the move. The list must contain custom field options or cascading options, but not both.
     *
     * @return string[]
     */
    public function getCustomFieldOptionIds(): array
    {
        return $this->customFieldOptionIds;
    }

    /**
     * A list of IDs of custom field options to move. The order of the custom field option IDs in the list is the order they are given after the move. The list must contain custom field options or cascading options, but not both.
     *
     * @param string[] $customFieldOptionIds
     */
    public function setCustomFieldOptionIds(array $customFieldOptionIds): self
    {
        $this->initialized['customFieldOptionIds'] = true;
        $this->customFieldOptionIds = $customFieldOptionIds;

        return $this;
    }

    /**
     * The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided.
     */
    public function getAfter(): string
    {
        return $this->after;
    }

    /**
     * The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided.
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;

        return $this;
    }

    /**
     * The position the custom field options should be moved to. Required if `after` isn't provided.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * The position the custom field options should be moved to. Required if `after` isn't provided.
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }
}
