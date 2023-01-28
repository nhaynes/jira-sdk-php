<?php

namespace JiraSdk\Model;

class UpdateDefaultScreenScheme
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
     * The ID of the screen scheme.
     *
     * @var string
     */
    protected $screenSchemeId;
    /**
     * The ID of the screen scheme.
     *
     * @return string
     */
    public function getScreenSchemeId(): string
    {
        return $this->screenSchemeId;
    }
    /**
     * The ID of the screen scheme.
     *
     * @param string $screenSchemeId
     *
     * @return self
     */
    public function setScreenSchemeId(string $screenSchemeId): self
    {
        $this->initialized['screenSchemeId'] = true;
        $this->screenSchemeId = $screenSchemeId;
        return $this;
    }
}
