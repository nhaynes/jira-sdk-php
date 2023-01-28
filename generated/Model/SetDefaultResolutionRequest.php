<?php

namespace JiraSdk\Model;

class SetDefaultResolutionRequest
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
     * The ID of the new default issue resolution. Must be an existing ID or null. Setting this to null erases the default resolution setting.
     *
     * @var string
     */
    protected $id;
    /**
     * The ID of the new default issue resolution. Must be an existing ID or null. Setting this to null erases the default resolution setting.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the new default issue resolution. Must be an existing ID or null. Setting this to null erases the default resolution setting.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
}
