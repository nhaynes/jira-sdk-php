<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueDate extends \ArrayObject
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
     * The default date in ISO format. Ignored if `useCurrent` is true.
     *
     * @var string
     */
    protected $date;
    /**
     * Whether to use the current date.
     *
     * @var bool
     */
    protected $useCurrent = false;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The default date in ISO format. Ignored if `useCurrent` is true.
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
    /**
     * The default date in ISO format. Ignored if `useCurrent` is true.
     *
     * @param string $date
     *
     * @return self
     */
    public function setDate(string $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;
        return $this;
    }
    /**
     * Whether to use the current date.
     *
     * @return bool
     */
    public function getUseCurrent(): bool
    {
        return $this->useCurrent;
    }
    /**
     * Whether to use the current date.
     *
     * @param bool $useCurrent
     *
     * @return self
     */
    public function setUseCurrent(bool $useCurrent): self
    {
        $this->initialized['useCurrent'] = true;
        $this->useCurrent = $useCurrent;
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
