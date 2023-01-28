<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueForgeObjectField extends \ArrayObject
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
     * The default JSON object.
     *
     * @var mixed[]
     */
    protected $object;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The default JSON object.
     *
     * @return mixed[]
     */
    public function getObject(): iterable
    {
        return $this->object;
    }
    /**
     * The default JSON object.
     *
     * @param mixed[] $object
     *
     * @return self
     */
    public function setObject(iterable $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;
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
