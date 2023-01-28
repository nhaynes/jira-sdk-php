<?php

namespace JiraSdk\Model;

class RichText extends \ArrayObject
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
     *
     *
     * @var bool
     */
    protected $empty;
    /**
     *
     *
     * @var bool
     */
    protected $finalised;
    /**
     *
     *
     * @var bool
     */
    protected $valueSet;
    /**
     *
     *
     * @var bool
     */
    protected $emptyAdf;
    /**
     *
     *
     * @return bool
     */
    public function getEmpty(): bool
    {
        return $this->empty;
    }
    /**
     *
     *
     * @param bool $empty
     *
     * @return self
     */
    public function setEmpty(bool $empty): self
    {
        $this->initialized['empty'] = true;
        $this->empty = $empty;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getFinalised(): bool
    {
        return $this->finalised;
    }
    /**
     *
     *
     * @param bool $finalised
     *
     * @return self
     */
    public function setFinalised(bool $finalised): self
    {
        $this->initialized['finalised'] = true;
        $this->finalised = $finalised;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getValueSet(): bool
    {
        return $this->valueSet;
    }
    /**
     *
     *
     * @param bool $valueSet
     *
     * @return self
     */
    public function setValueSet(bool $valueSet): self
    {
        $this->initialized['valueSet'] = true;
        $this->valueSet = $valueSet;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getEmptyAdf(): bool
    {
        return $this->emptyAdf;
    }
    /**
     *
     *
     * @param bool $emptyAdf
     *
     * @return self
     */
    public function setEmptyAdf(bool $emptyAdf): self
    {
        $this->initialized['emptyAdf'] = true;
        $this->emptyAdf = $emptyAdf;
        return $this;
    }
}
