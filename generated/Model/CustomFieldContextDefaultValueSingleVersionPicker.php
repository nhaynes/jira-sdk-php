<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueSingleVersionPicker extends \ArrayObject
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
     * The ID of the default version.
     *
     * @var string
     */
    protected $versionId;
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
     * The ID of the default version.
     *
     * @return string
     */
    public function getVersionId(): string
    {
        return $this->versionId;
    }
    /**
     * The ID of the default version.
     *
     * @param string $versionId
     *
     * @return self
     */
    public function setVersionId(string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
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
