<?php

namespace JiraSdk\Model;

class IncludedFields
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
     * @var string[]
     */
    protected $actuallyIncluded;
    /**
     *
     *
     * @var string[]
     */
    protected $excluded;
    /**
     *
     *
     * @var string[]
     */
    protected $included;
    /**
     *
     *
     * @return string[]
     */
    public function getActuallyIncluded(): array
    {
        return $this->actuallyIncluded;
    }
    /**
     *
     *
     * @param string[] $actuallyIncluded
     *
     * @return self
     */
    public function setActuallyIncluded(array $actuallyIncluded): self
    {
        $this->initialized['actuallyIncluded'] = true;
        $this->actuallyIncluded = $actuallyIncluded;
        return $this;
    }
    /**
     *
     *
     * @return string[]
     */
    public function getExcluded(): array
    {
        return $this->excluded;
    }
    /**
     *
     *
     * @param string[] $excluded
     *
     * @return self
     */
    public function setExcluded(array $excluded): self
    {
        $this->initialized['excluded'] = true;
        $this->excluded = $excluded;
        return $this;
    }
    /**
     *
     *
     * @return string[]
     */
    public function getIncluded(): array
    {
        return $this->included;
    }
    /**
     *
     *
     * @param string[] $included
     *
     * @return self
     */
    public function setIncluded(array $included): self
    {
        $this->initialized['included'] = true;
        $this->included = $included;
        return $this;
    }
}
