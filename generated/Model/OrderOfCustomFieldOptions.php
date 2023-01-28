<?php

namespace JiraSdk\Model;

class OrderOfCustomFieldOptions
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
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
     *
     * @return self
     */
    public function setCustomFieldOptionIds(array $customFieldOptionIds): self
    {
        $this->initialized['customFieldOptionIds'] = true;
        $this->customFieldOptionIds = $customFieldOptionIds;
        return $this;
    }
    /**
     * The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided.
     *
     * @return string
     */
    public function getAfter(): string
    {
        return $this->after;
    }
    /**
     * The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided.
     *
     * @param string $after
     *
     * @return self
     */
    public function setAfter(string $after): self
    {
        $this->initialized['after'] = true;
        $this->after = $after;
        return $this;
    }
    /**
     * The position the custom field options should be moved to. Required if `after` isn't provided.
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }
    /**
     * The position the custom field options should be moved to. Required if `after` isn't provided.
     *
     * @param string $position
     *
     * @return self
     */
    public function setPosition(string $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;
        return $this;
    }
}
