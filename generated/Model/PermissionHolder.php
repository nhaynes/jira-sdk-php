<?php

namespace JiraSdk\Model;

class PermissionHolder
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
     * The type of permission holder.
     *
     * @var string
     */
    protected $type;
    /**
     * As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission.
     *
     * @var string
     */
    protected $parameter;
    /**
     * The identifier associated with the `type` value that defines the holder of the permission.
     *
     * @var string
     */
    protected $value;
    /**
     * Expand options that include additional permission holder details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The type of permission holder.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of permission holder.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission.
     *
     * @return string
     */
    public function getParameter(): string
    {
        return $this->parameter;
    }
    /**
     * As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission.
     *
     * @param string $parameter
     *
     * @return self
     */
    public function setParameter(string $parameter): self
    {
        $this->initialized['parameter'] = true;
        $this->parameter = $parameter;
        return $this;
    }
    /**
     * The identifier associated with the `type` value that defines the holder of the permission.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * The identifier associated with the `type` value that defines the holder of the permission.
     *
     * @param string $value
     *
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * Expand options that include additional permission holder details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional permission holder details in the response.
     *
     * @param string $expand
     *
     * @return self
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
}
