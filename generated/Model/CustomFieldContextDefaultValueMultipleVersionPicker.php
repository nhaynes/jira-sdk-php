<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueMultipleVersionPicker extends \ArrayObject
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
     * The IDs of the default versions.
     *
     * @var string[]
     */
    protected $versionIds;
    /**
     * The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
     *
     * @var string
     */
    protected $versionOrder;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The IDs of the default versions.
     *
     * @return string[]
     */
    public function getVersionIds(): array
    {
        return $this->versionIds;
    }
    /**
     * The IDs of the default versions.
     *
     * @param string[] $versionIds
     *
     * @return self
     */
    public function setVersionIds(array $versionIds): self
    {
        $this->initialized['versionIds'] = true;
        $this->versionIds = $versionIds;
        return $this;
    }
    /**
     * The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
     *
     * @return string
     */
    public function getVersionOrder(): string
    {
        return $this->versionOrder;
    }
    /**
     * The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
     *
     * @param string $versionOrder
     *
     * @return self
     */
    public function setVersionOrder(string $versionOrder): self
    {
        $this->initialized['versionOrder'] = true;
        $this->versionOrder = $versionOrder;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
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
}
