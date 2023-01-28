<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueFloat extends \ArrayObject
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
     * The default floating-point number.
     *
     * @var float
     */
    protected $number;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The default floating-point number.
     *
     * @return float
     */
    public function getNumber(): float
    {
        return $this->number;
    }
    /**
     * The default floating-point number.
     *
     * @param float $number
     *
     * @return self
     */
    public function setNumber(float $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
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
