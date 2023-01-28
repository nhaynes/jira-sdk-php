<?php

namespace JiraSdk\Model;

class CustomFieldReplacement
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
     * The ID of the custom field in which to replace the version number.
     *
     * @var int
     */
    protected $customFieldId;
    /**
     * The version number to use as a replacement for the deleted version.
     *
     * @var int
     */
    protected $moveTo;
    /**
     * The ID of the custom field in which to replace the version number.
     *
     * @return int
     */
    public function getCustomFieldId(): int
    {
        return $this->customFieldId;
    }
    /**
     * The ID of the custom field in which to replace the version number.
     *
     * @param int $customFieldId
     *
     * @return self
     */
    public function setCustomFieldId(int $customFieldId): self
    {
        $this->initialized['customFieldId'] = true;
        $this->customFieldId = $customFieldId;
        return $this;
    }
    /**
     * The version number to use as a replacement for the deleted version.
     *
     * @return int
     */
    public function getMoveTo(): int
    {
        return $this->moveTo;
    }
    /**
     * The version number to use as a replacement for the deleted version.
     *
     * @param int $moveTo
     *
     * @return self
     */
    public function setMoveTo(int $moveTo): self
    {
        $this->initialized['moveTo'] = true;
        $this->moveTo = $moveTo;
        return $this;
    }
}
